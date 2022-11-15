<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// })->name('user.home');
Route::prefix('/')->middleware('user')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user-profile');
    Route::get('/user-detail/{id}', [UserController::class, 'user_details'])->name('user-details');
    Route::post('/update-profile', [UserController::class, 'update_profile'])->name('update-profile');
    Route::post('/password-update', [UserController::class, 'password_update'])->name('password-update');
});
Route::get('/proposal', [UserController::class, 'pagination']);
Route::get('/register', function () {
    return view('signup');
})->name('user.signup');
Route::get('/privacy-policy', function () {
    return view('privacy');
})->name('user.privacy-policy');
Route::get('/about-us', function () {
    return view('about');
})->name('user.about-us');
Route::get('/services', function () {
    return view('services');
})->name('user.services');
Route::get('/', [UserController::class, 'index'])->name('user.home');
Route::post('user-login', [UserController::class, 'login'])->name('user-login');
Route::get('/user-logout', [UserController::class, 'user_logout'])->name('user-logout');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/search', [UserController::class, 'search'])->name('user.search');
Route::get('/{city}/{gender}/{status}', [UserController::class, 'quick_search'])->name('user.quick-search');

Route::get('/sp-admin', [AdminController::class, 'login_page'])->name('admin.login-p');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::prefix('/admin')->middleware('admin')->group(function () {
    Route::get('/logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/get-users', [AdminController::class, 'get_users'])->name('admin.get-users');
    Route::get('/countries', [AdminController::class, 'countries'])->name('admin.countries');
    Route::get('/get-countries', [AdminController::class, 'get_countries'])->name('admin.get-countries');
    Route::get('/states', [AdminController::class, 'states'])->name('admin.states');
    Route::post('/get-states', [AdminController::class, 'get_states'])->name('admin.get-states');
    Route::get('/cities', [AdminController::class, 'cities'])->name('admin.cities');
    Route::get('/get-cities', [AdminController::class, 'get_cities'])->name('admin.get-cities');
    Route::get('/website-setting', [AdminController::class, 'web_setting'])->name('admin.web-setting');
    Route::post('/website-setting', [AdminController::class, 'website_setting'])->name('admin.website-setting');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/update-profile', [AdminController::class, 'update_profile'])->name('admin.update-profile');
    Route::post('/update-password', [AdminController::class, 'update_password'])->name('admin.update-password');
    Route::post('/update-image', [AdminController::class, 'update_image'])->name('admin.update-image');
    Route::get('/users-export', [AdminController::class, 'users_export'])->name('admin.users_export');
    Route::post('/users-import', [AdminController::class, 'import'])->name('admin.import');
});
