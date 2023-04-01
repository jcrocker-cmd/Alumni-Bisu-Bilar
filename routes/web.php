<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ReissueanceController;
use App\Http\Controllers\AlumniIDController;
use App\Http\Controllers\AlumniMemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
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


// DASHBOARD

Route::middleware(['preventBackHistory'])->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/dashboard-login', [AdminController::class,'route_db_login']);
    });

    Route::middleware(['auth','admin'])->group(function () {

        // Route::post('/dashboard-check-login', [AdminController::class,'db_check_login']);

        Route::get('/dashboard', [AdminController::class,'route_dashboard'])->name('dashboard');


        Route::get('/alumni-membership', [AlumniMemController::class,'db_route_alumni_mem']);
        Route::get('/alumni_mem/{id}/ajaxview', [AlumniMemController::class, 'db_alumni_mem_ajaxview']);
        Route::get('/delete_alumni_mem/{id}', [AlumniMemController::class, 'db_delete_alumni_mem']);


        Route::get('/alumni-id', [AlumniIDController::class,'db_route_alumni_id']);
        Route::get('/alumni_id/{id}/ajaxview', [AlumniIDController::class, 'db_alumni_id_ajaxview']);
        Route::get('/delete_alumni_id/{id}', [AlumniIDController::class, 'db_delete_alumni_id']);

        Route::get('/users', function () {
            return view('dashboard.users');
        });

        Route::put('/change-admin-password', [AdminController::class,'adminpassword_update']);

        Route::get('/reissueance', [ReissueanceController::class,'db_route_reissuance']);
        Route::get('/reissueance/{id}/ajaxview', [ReissueanceController::class, 'db_reissueance_ajaxview']);
        Route::get('/delete_reissueance/{id}', [ReissueanceController::class, 'db_delete_reissueance']);




        Route::get('/announcement', [AnnouncementController::class,'route_announcement']);
        Route::post('/post_announcement', [AnnouncementController::class,'post_announcement']);
        Route::put('/update_announcement', [AnnouncementController::class, 'update_announcement']);
        Route::get('/delete_announcement/{id}', [AnnouncementController::class, 'delete_announcement']);
        Route::get('/announcement/{id}/ajaxview', [AnnouncementController::class, 'db_announcement_ajaxview']);
        Route::get('/announcement/{id}/ajaxedit', [AnnouncementController::class, 'db_announcement_ajaxedit']);



        Route::get('/settings', function () {
            return view('dashboard.settings');
        });
    });
});


Route::middleware(['preventBackHistory'])->group(function () {

    Route::get('/adminlogout', [AdminController::class,'adminlogout']);





    Route::middleware(['guest'])->group(function () {
        Route::get('/', function () {
            return view('main.login');
        });

        Route::get('/welcome', function () {
            return view('welcome');
        });


        Route::get('/student_login', [LoginController::class,'route_login']);


        Route::get('/signin', function () {
            return view('main.signin');
        });

        Route::get('/signin', [SigninController::class,'route_main_signin']);
        Route::post('/post_signin', [SigninController::class,'post_main_signin']);
    });


    Route::middleware(['auth','student'])->group(function () {

        Route::get('/home-alumni-id', [AlumniIDController::class,'route_alumni_id']);
        Route::post('/home-alumni-id-post', [AlumniIDController::class,'post_alumni_id']);

        Route::get('/home-alumni-membership', [AlumniMemController::class,'route_alumni_mem']);
        Route::post('/home-alumni-membership-post', [AlumniMemController::class,'post_alumni_mem']);

        Route::get('/home-alumni-membership', function () {
            return view('main.alumni-membership');
        });

        Route::get('/home-account', function () {
            return view('main.account');
        });


        Route::get('/alumni-id', [AlumniIDController::class,'route_alumni_id']);

        Route::get('/home-reissuance', [ReissueanceController::class,'route_reissuance']);
        Route::post('/home-reissuance-post', [ReissueanceController::class,'post_reissuance']);

        Route::get('/home', [ClientController::class,'route_home'])->name('client');
    });
    Route::get('/clientlogout', [ClientController::class,'clientlogout']);


});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
