<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\JobOpportunitiesController;

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

Route::group(['middleware' => 'prevent-back-history'], function () {

    // Default module
    Route::get('/', function () {
        return view('login');
    });

    // User's resource


    // Admin's resource
    Route::resource('admin_dashboard', 'App\Http\Controllers\AdminDashboardController');
    Route::get('view_newly_hired/{fname}/{mi}/{lname}/{gender}/{contact}/{email}/{home}/{present}/{school}/{batch_no}/{pending}/{status}/{cname}/{location}/{title}/{work_arr}/{update_date}', 'App\Http\Controllers\AdminDashboardController@alumni')->name('alumni.show');
    Route::resource('alumni_records', 'App\Http\Controllers\AlumniRecordsController');
    Route::resource('scholarship_sponsors', 'App\Http\Controllers\ScholarshipSponsorsController');
    // Route::get('edit_sponsor/{scholarship_sponsors}', 'App\Http\Controllers\ScholarshipSponsorsController@update')->name('sponsor.show');
    Route::resource('job_opportunities', 'App\Http\Controllers\JobOpportunitiesController');
    Route::resource('report', 'App\Http\Controllers\ReportController');
    Route::resource('register', 'App\Http\Controllers\RegisterController');
    Route::resource('login', 'App\Http\Controllers\LoginController');
    Route::resource('logout', 'App\Http\Controllers\LogoutController');

    //Alumni's resource
    Route::resource('alumni_view', 'App\Http\Controllers\MyAlumniRecordController');
    //Route::resource('alumni_edit', 'App\Http\Controllers\AlumniRecordsController');
    Route::resource('user_dashboard', 'App\Http\Controllers\UserDashboardController');
    Route::resource('view_job', 'App\Http\Controllers\ViewJobContorller');
    // Route::get('view_job/{id}', [UserDashboardController::class, 'show'])->name('post.show');
    //Route::resource('my_record', 'App\Http\Controllers\MyAlumniRecordController');

    Route::get('view_job/{id}/{c_name}/{title}/{role}/{reqs}/{location}/{vacancy}/{status}', 'App\Http\Controllers\UserDashboardController@show')->name('post.show');


    //Email 
    Route::resource('email', EmailController::class);
});
