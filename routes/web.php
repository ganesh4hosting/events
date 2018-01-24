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
    return view('index', array('isvalid' => true));
});

Route::get('/assignuser', 'EventsController@assignuser');
Route::get('/logout', 'EventsController@logout');


Route::post('/checklogin', 'EventsController@checklogin');
Route::post('/ajax/adduser', 'AjaxController@adduser');
Route::post('/ajax/addevent', 'AjaxController@addevent');
Route::post('/ajax/retrivedata', 'AjaxController@retrivedata');
Route::post('/ajax/assignuser', 'AjaxController@assignuser');
