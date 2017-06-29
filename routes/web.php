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

Route::get('historie', array('uses' => 'Web\HistoryController@index'))->name('historie');

Route::match(['put', 'patch'], 'patienten/{patienten}/checkout', array('uses' => 'Web\PatientController@checkout'))->name('patienten.checkout');

Route::delete('historie/{patienten}/delete', array('uses' => 'Web\HistoryController@destroy'))->name('historie.destroy');

Route::resource('patienten', 'Web\PatientController');

Route::get('inloggen',                   array('uses' => 'Web\PersonalController@login'))->name('patient.login');
Route::get('{band_number}/status/',      array('uses' => 'Web\PersonalController@status'))->name('patient.status');
Route::get('{band_number}/vergelijken/', array('uses' => 'Web\PersonalController@compare'))->name('patient.compare');

