<?php

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
use \Illuminate\Support\Facades\Route;

Route::any('{all}', function () {
    return view('app');
})->where(['all' => '^(?!api).*']);

Route::get('/', function () {
    return view('app');
});

Route::get('/login', function () {
    return 'login';
})->name('login');

Route::get('/logout', function () {
    return 'logout';
})->name('logout');

Route::get('/register', function () {
    return 'register';
})->name('register');

