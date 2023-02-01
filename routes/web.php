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

Route::get('/', function () {
    return view('main.login');
});

Route::get('/login', function () {
    return view('main.login');
});

Route::get('/signin', function () {
    return view('main.signin');
});

Route::get('/home', function () {
    return view('main.home');
});

Route::get('/home-alumni-id', function () {
    return view('main.alumni-id');
});

Route::get('/home-alumni-membership', function () {
    return view('main.alumni-membership');
});


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

Route::get('/announcement', function () {
    return view('dashboard.announcement');
});

Route::get('/settings', function () {
    return view('dashboard.settings');
});