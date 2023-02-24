<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ReissueanceController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('main.login');
});

Route::get('/login', function () {
    return view('main.login');
});

Route::get('/login', [LoginController::class,'route_login']);
Route::post('/logincheck', [LoginController::class,'check_login']);


Route::get('/signin', function () {
    return view('main.signin');
});

Route::get('/signin', [SigninController::class,'route_main_signin']);
Route::post('/post_signin', [SigninController::class,'post_main_signin']);


Route::get('/home', function () {
    return view('main.home');
});

Route::get('/home', [AnnouncementController::class,'route_home']);

Route::get('/home-alumni-id', function () {
    return view('main.alumni-id');
});

Route::get('/home-alumni-membership', function () {
    return view('main.alumni-membership');
});

Route::get('/home-account', function () {
    return view('main.account');
});

Route::get('/home-reissuance', [ReissueanceController::class,'route_reissuance']);

Route::post('/home-reissuance-post', [ReissueanceController::class,'post_reissuance']);




// DASHBOARD

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/alumni-membership', function () {
    return view('dashboard.alumni-membership');
});

Route::get('/alumni-id', function () {
    return view('dashboard.alumni-id');
});

Route::get('/users', function () {
    return view('dashboard.users');
});

Route::get('/announcement', [AnnouncementController::class,'route_announcement']);

Route::post('/post_announcement', [AnnouncementController::class,'post_announcement']);


Route::get('/settings', function () {
    return view('dashboard.settings');
});