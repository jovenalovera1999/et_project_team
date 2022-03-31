<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'prevent-back-history'], function() {

    // Default module
    Route::get('/', function () {
        return view('login');
    });

    // User's resource
    Route::resource('user_dashboard', 'App\Http\Controllers\UserDashboardController');

    // Admin's resource
    Route::resource('admin_dashboard', 'App\Http\Controllers\AdminDashboardController');
    Route::resource('alumni_records', 'App\Http\Controllers\AlumniRecordsController');
    Route::resource('scholarship_sponsors', 'App\Http\Controllers\ScholarshipSponsorsController');
    Route::resource('register', 'App\Http\Controllers\RegisterController');
    Route::resource('login', 'App\Http\Controllers\LoginController');
    Route::resource('logout', 'App\Http\Controllers\LogoutController');
});