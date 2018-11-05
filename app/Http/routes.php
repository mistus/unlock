<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/information', function () {
//	return view('/informationPage/InformationIndex', ["a" => 15225536]);
//});

Route::get('/information','InformationPageController@getList');
Route::get('/accountDetailPage/{AccountId}','InformationPageController@getAccountDetailPage');

Route::get('/registerPage','InformationPageController@getRegisterPage');
Route::post('/register','InformationPageController@postRegister');

Route::get('/updatePage/{AccountId}','InformationPageController@getUpdatePage');
Route::post('/updateAchievements','InformationPageController@postUpdateAchievements');
