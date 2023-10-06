<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\UserController;
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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/Dashboard', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');
Route::get('/', $controller_path . '\authentications\LoginBasic@index')->name('Login');

// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/siswa', $controller_path . '\pages\SiswaController@index')->name('siswa');
Route::get('/user', $controller_path . '\pages\UserController@index')->name('user');
Route::controller(UserController::class)->group(function(){
    $controller_path = 'App\Http\Controllers';
    Route::get('/user', 'index')->name('user.index');
    Route::post('/user', $controller_path . '\pages\UserController@store')->name('user.store');
    // Route::get('/user/store', 'store')->name('user.store');
});


Route::get('/guru', $controller_path . '\pages\GuruController@index')->name('guru');
Route::get('/jurusan', $controller_path . '\pages\JurusanController@index')->name('jurusan');
Route::get('/mapel', $controller_path . '\pages\MapelController@index')->name('mapel');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
