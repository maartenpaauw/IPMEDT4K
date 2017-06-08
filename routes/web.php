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

Route::get('/', function () {
    return view('welcome');
});


Route::get('monitor', 'Web\MonitorController')->name('monitor');

Route::get('dashboard', 'Web\DashboardController')->name('dashboard');

Route::get('login', array('uses' => 'Web\LoginController@showLogin'));

Route::post('login', array('uses' => 'Web\LoginController@doLogin'));

Route::get('personal/login', array('uses' => 'Web\PersonalController@login'));


Route::resource('patienten', 'Web\PatientController');

