<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * News
 */
Route::get('nu.nl', 'API\NewsController');

/*
 * Weather
 */
Route::get('weather', 'API\WeatherController');

/*
 * Patients
 */
Route::get('patients', 'API\PatientController@index');
Route::get('patients/last-10', 'API\PatientController@lastTenPatients');
Route::get('patients/no-triage', 'API\PatientController@noTriage');
Route::get('patients/count', 'API\PatientController@count');
Route::get('patients/waiting/{band_number}', 'API\PatientController@waitingPatients');
Route::get('patients/{band_number}', 'API\PatientController@getPatient');
