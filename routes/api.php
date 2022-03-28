<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registerTime', 'HomeController@registerTime');

Route::post('/registerContent', 'HomeController@registerContent');

Route::get('/fetchThisGoal', 'HomeController@fetchThisGoal');

Route::post('/submitStudy', 'HomeController@submitStudy');

Route::get('/fetchStudyContent', 'HomeController@fetchStudyContent');

Route::get('/fetchContentperMonth', 'HomeController@fetchContentperMonth');

Route::post('/editStudy', 'HomeController@editStudy');


Route::post('/deleteStudy', 'HomeController@deleteStudy');

