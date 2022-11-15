<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Admins;
use Khsing\World\World;
use App\Models\WorldCities;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use App\Models\WorldCountries;
use App\Models\WorldDivisions;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash as Hash;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class AdminController extends Controller
{
    public function login_page()
    {
        // if (!session()->has('admin')) {
        return view('admin.login');
        // } else {
        //     return redirect('/dashboard');
        // }
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',

        ]);
        $email = $request->email;
        $pass = md5($request->password);
        $user = Admins::where(function ($query) use ($email) {
            $query->where('email', '=', $email)->orWhere('username', '=', $email);
        })->where('password', '=', $pass)->first();
        if (!empty($user)) {
            $admin['f_name'] = $user->first_name;
            $admin['l_name'] = $user->last_name;
            $admin['username'] = $user->username;
            $admin['email'] = $user->email;
            $admin['id'] = $user->id;
            $admin['media'] = $user->media;
            session()->put('admin', $admin);
            return redirect(route('admin.dashboard'));
        } else {
            notify()->error('Invalid Cridentials', '', 'topRight');
            return redirect()->back();
        }
    }

    public function admin_logout()
    {
        session()->forget('admin');
        return redirect(route('admin.login-p'));
    }

    public function dashboard()
    {
        $active = 'dashboard';
        $totalUsers = User::get()->count();
        $featuredUsers = User::where('is_featured', 'Yes')->count();
        $verifiedUsers = User::whereNotNull('email_verified_at',)->count();
        $pendingUsers = User::where('status', 'pending')->count();
        $data = compact('active', 'totalUsers', 'featuredUsers', 'verifiedUsers', 'pendingUsers');
        return view('admin.dashboard')->with($data);
    }

    public function users()
    {
        $active = 'user';
        $data = compact('active');
        return view('admin.user')->with($data);
    }

    public function countries()
    {
        if (session()->has('admin')) {
            $active = 'country';
            $data = compact('active');
            return view('admin.country')->with($data);
        } else {
            return redirect('admin/sp-admin');
        }
    }

    public function states()
    {
        $active = 'state';
        $data = compact('active');
        return view('admin.state')->with($data);
    }

    public function get_countries(Request $request)
    {
        if ($request->ajax()) {
            return dataTables()->of(WorldCountries::select('id', 'name', 'full_name')->get())->toJson();
        }
    }

    public function get_states(Request $request)
    {
        if ($request->ajax()) {
            $states = WorldDivisions::select('id', 'name', 'country_id')->with('world_countries')->get();
            $states->map(function ($i) {
                $i->id = $i->id;
                $i->name = $i->name;
                $i->country = $i->world_countries->name;
                unset($i->country_id);
                unset($i->world_countries);
                return $i;
            });
            return dataTables()->of($states)->toJson();
        }
    }

    public function cities()
    {
        $active = 'city';
        $data = compact('active');
        return view('admin.city')->with($data);
    }

    public function get_cities(Request $request)
    {
        if ($request->ajax()) {
            ini_set('memory_limit', '1024M');
            $cities = WorldCities::select('id', 'name', 'code', 'iana_timezone')->orderBy('name', 'asc')->get();
            return dataTables()->of($cities)->toJson();
        }
    }

    public function get_users(Request $request)
    {
        if ($request->ajax()) {
            $users = User::all();
            return dataTables()->of($users)->toJson();
        }
    }

    public function web_setting()
    {

        $active = 'setting';
        $data = compact('active');
        return view('admin.webSetting')->with($data);
    }

    public function website_setting(Request $request)
    {
        $update = WebsiteSetting::where('id', '=', $request->id)->update(['content' => $request->text]);
        if ($update) {
            notify()->success('Updated.', '', 'topRight');
        } else {
            notify()->error('Try Again.', '', 'topRight');
        }
        return redirect()->back();
    }

    public function profile()
    {
        $active = '';
        $data = compact('active');
        return view('admin.profile')->with($data);
    }

    public function update_profile(Request $request)
    {
        $update = Admins::where('id', '=', session()->get('admin.id'))->update(['first_name' => $request->firstName, 'last_name' => $request->lastName]);
        if ($update) {
            notify()->success('profile Updated', '', 'topRight');
            return redirect(route('admin.logout'));
        } else {
            notify()->error('Try Again', '', 'topRight');
            return redirect()->back();
        }
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $update = Admins::where('id', '=', session()->get('admin.id'))->update(['password' => md5($request->password)]);
        if ($update) {
            notify()->success('Password Updated', '', 'topRight');
            return redirect(route('admin.logout'));
        } else {
            notify()->error('Try Again', '', 'topRight');
            return redirect()->back();
        }
    }

    public function update_image(Request $request)
    {
        $uploadedFile = $request->file('media')->getClientOriginalName();
        $uploadedFileName = pathinfo($uploadedFile, PATHINFO_FILENAME);
        $fileName = $uploadedFileName . "-" . session()->get('admin.username') . "-" . session()->get('admin.id') . "." . $request->file('media')->getClientOriginalExtension();
        $uploaded = $request->file('media')->storeAs('admins', $fileName, ['disk' => 'public']);
        $update = Admins::where('id', '=', session()->get('admin.id'))->update(['media' => $uploaded]);
        if ($update) {
            notify()->success('Profile Picture Updated', '', 'topRight');
            return redirect(route('admin.logout'));
        } else {
            notify()->error('Try Again', '', 'topRight');
            return redirect()->back();
        }
    }
    public function users_export()
    {
        return Excel::download(new UsersExport, 'users.csv');
    }
    public function import(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $location = public_path('upload/csv');
            // Upload file
            $file->move($location, $filename);
            // In case the uploaded file path is to be stored in the database 
            $filepath = $location . "/" . $filename;
            // Reading file
            $file = fopen($filepath, "r");
            // Read through the file and store the contents as an array
            $importData_arr = array();
            $i = 0;
            //Read the contents of the uploaded file 
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata);
                // Skip first row (Remove below comment if you want to skip the first row)
                // if ($i == 0) {
                //     $i++;
                //     continue;
                // }
                for ($c = 0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata[$c];
                }
                $i++;
            }
            fclose($file); //Close after reading
            $j = 0;
            foreach ($importData_arr as $importData) {
                $users = new User();                
                $users->first_name = $importData[0];
                $users->last_name = $importData[1];
                $users->show_name = $importData[2];
                $users->email = $importData[3];
                $users->dob = date("Y/m/d",strtotime($importData[4]));                
                $users->title = $importData[5];                
                $users->gender = $importData[6];
                $users->height = $importData[7];
                $users->marital_status = $importData[8];
                $users->caste = $importData[9];
                $users->look = $importData[10];
                $users->education = $importData[11];
                $users->occupation = $importData[12];
                $users->income = $importData[13];
                $users->religion = $importData[14];
                $users->whatsapp = $importData[15];
                $users->mobile = $importData[16];
                // $users->world_countries_id = $importData[20];
                // $users->world_divisions_id = $importData[21];
                // $users->world_cities_id = $importData[22];                
                $users->status = 'Active';
                $users->password  = md5('12345678');
                $users->save();
                $j++;
            }
            notify()->success('file Uploaded', '', 'topRight');
            return redirect()->back();
        } else {
            notify()->error('No file Chosen', '', 'topRight');
            return redirect()->back();
        }
    }
}