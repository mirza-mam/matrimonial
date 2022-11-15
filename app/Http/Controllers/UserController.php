<?php

namespace App\Http\Controllers;

use App\Models\Profile_visit;
use App\Models\User;
use App\Models\WorldCities;
use App\Models\WorldCountries;
use App\Models\WorldDivisions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'active')->paginate(4);
        $countries = WorldCountries::where('id', '<>', '92')->orderBy('name', 'asc')->get();
        $divisions = WorldDivisions::where('country_id', '=', '92')->orderBy('name', 'asc')->get();
        $cities = WorldCities::where('country_id', '=', '92')->orderBy('name', 'asc')->get();
        $featuredUsers = User::where('status', 'active')->where('is_featured', '=', 'Yes')->get();
        return view('home', compact('users', 'cities', 'divisions', 'countries', 'featuredUsers'));
    }

    public function quick_search($city, $gender, $status)
    {
        $countries = WorldCountries::where('id', '<>', '92')->orderBy('name', 'asc')->get();
        $divisions = WorldDivisions::where('country_id', '=', '92')->orderBy('name', 'asc')->get();
        $cities = WorldCities::where('country_id', '=', '92')->orderBy('name', 'asc')->get();
        $id = WorldCities::where('name', '=', ucfirst($city))->first()->id;
        $users = User::where('status', 'active')->where('world_cities_id', '=', $id)->where('gender', '=', ucfirst($gender))->where('marital_status', '=', ucfirst($status))->paginate(4);
        $featuredUsers = User::where('status', 'active')->where('is_featured', '=', 'Yes')->get();
        return view('search', compact('users', 'cities', 'divisions', 'countries', 'featuredUsers'));
    }

    public function pagination()
    {
        $users = User::where('status', 'active')->paginate(4);
        return view('pagination', compact('users'))->render();
    }

    public function search_pagination()
    {
        $users = User::where('status', 'active')->paginate(4);
        return view('pagination', compact('users'))->render();
    }

    public function search(Request $request)
    {
        $occupation = $request->profession;
        $province = $request->province;
        $city = $request->city;
        $gender = $request->gender;
        $marital_status = $request->marital_status;
        $country = $request->country;
        $countries = WorldCountries::where('id', '<>', '92')->orderBy('name', 'asc')->get();
        $divisions = WorldDivisions::where('country_id', '=', '92')->orderBy('name', 'asc')->get();
        $cities = WorldCities::where('country_id', '=', '92')->orderBy('name', 'asc')->get();
        $featuredUsers = User::where('is_featured', '=', 'Yes')->get();
        $users = User::query();
        if (isset($occupation)) $users->where('occupation', $occupation);
        if (isset($gender)) $users->where('gender', $gender);
        if (isset($marital_status)) $users->where('marital_status', $marital_status);
        if (isset($province)) $users->where('world_divisions_id', $province);
        if (isset($city)) $users->where('world_cities_id', $city);
        if (isset($country)) $users->where('world_countries_id', $country);
        $users =  $users->paginate(4);

        return view('search', compact('users', 'cities', 'divisions', 'countries', 'featuredUsers'));
    }
    public function profile()
    {
        $loggedInUser = Session::get('user')->id;
        $profile = User::where('id', $loggedInUser)->first();
        return view('profile', compact('profile'));
    }
    public function user_details($id)
    {
        $detail = User::where('id', $id)->first();
        $loggedInUser = Session::get('user')->id;
        Profile_visit::updateOrCreate([
            'user_id' => $detail->id,
            'view_by' => $loggedInUser
        ], [
            'user_id' => $detail->id,
            'view_by' => $loggedInUser
        ]);

        return view('userDetail', compact('detail'));
    }
    public function update_profile(Request $request)
    {

        // $request->validate([
        //     'first_name' => 'required',
        //     'first_name' => 'required',
        //     'email' => 'required|email',
        //     'dob' => 'required',
        //     'gender' => 'required',
        //     'height' => 'required',
        //     'martial_status' => 'required',
        //     'caste' => 'required',
        //     //'title' => 'required',
        //     'occupation' => 'required',
        //     'look' => 'required',
        //     'income' => 'required',
        //     'religion' => 'required',
        //     'country' => 'required',
        //     'state' => 'required',
        //     'city' => 'required',
        //     'whatsapp' => 'required',
        //     'mobile' => 'required',
        // ]);


        $userId = $request->user_id;
        $first_name = $request->first_name;
        $updatedUser = User::where('id', $userId)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'show_name' => $request->show_name,
            // 'email' => $request->email,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'height' => $request->height,
            'marital_status' => $request->marital_status,
            'caste' => $request->caste,
            'title' => $request->title,
            'occupation' => $request->occupation,
            'look' => $request->look,
            'income' => $request->income,
            'religion' => $request->religion,
            'world_countries_id' => $request->country,
            'world_divisions_id' => $request->state,
            'world_cities_id' => $request->city,
            'whatsapp' => $request->whatsapp,
            'mobile' => $request->mobile,
        ]);
        notify()->success('updated Successfully', '', 'topRight');
        return redirect()->back();
    }
    public function password_update(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $loggedInUser = Session::get('user')->id;
        $updatedPassword = User::where('id', '=', $loggedInUser)->update(['password' => md5($request->password)]);
        if ($updatedPassword) {

            notify()->success('Password Updated', '', 'topRight');
            return redirect()->back();
        } else {
            notify()->error('Try Again', '', 'topRight');
            return redirect()->back();
        }
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
        $user = User::where(function ($query) use ($email) {
            $query->where('email', '=', $email);
        })->where('password', '=', $pass)->first();
        if (!empty($user)) {
            $user['f_name'] = $user->first_name;
            $user['l_name'] = $user->last_name;
            $user['username'] = $user->username;
            $user['email'] = $user->email;
            $user['id'] = $user->id;
            $user['media'] = $user->media;
            session()->put('user', $user);
            return redirect(route('user.home'));
            return redirect()->back();
        } else {
            notify()->error('Invalid Cridentials', '', 'topRight');
            return redirect()->back();
        }
    }
    public function user_logout()
    {
        session()->forget('user');
        return redirect(route('user.home'));
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'look' => 'required',
            'income' => 'required',
            'whatsapp' => 'required',
        ]);
        $password = $request->input('password');

        $registeredUser = User::create([
            'you_are' => $request->you_are,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'show_name' => $request->show_name,
            'email' => $request->email,
            'password' => $request->pasword,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'height' => $request->height,
            'marital_status' => $request->height,
            'caste' => $request->caste,
            'password' => Hash::make($password),
            'title' =>  $request->title,
            'occupation' =>  $request->occupation,
            'look' =>  $request->look,
            'income' =>  $request->income,
            'religion' =>  $request->religion,
            'world_countries_id' =>  $request->country,
            'world_divisions_id' =>  $request->state,
            'world_cities_id' =>  $request->city,
            'whatsapp' =>  $request->whatsapp,
            'mobile' =>  $request->mobile,
            //'qualification' =>  $request->qualification,
        ]);
        Session::put('user',  $registeredUser);
        notify()->success('User registered', '', 'topRight');
        return redirect()->back();
    }
}
