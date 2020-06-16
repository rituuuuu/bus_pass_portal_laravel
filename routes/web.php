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

Route::get('/', 'MainController@index');
Route::get('/register', 'MainController@register');
Route::post('/checklogin', 'MainController@checklogin');
Route::post('/addUser', 'MainController@addUser');
Route::get('/logout', 'MainController@logout');


Route::get('/types', 'TypesController@index');


Route::get('/pass', 'PassController@index');
Route::get('/pass/success', 'PassController@addSuccess');
Route::post('/addPassHolder/{type?}', 'PassController@addPassHolder');

Route::get('/details/student', 'DetailsController@students');
Route::get('/details/employee', 'DetailsController@employee');
Route::get('/about', 'DetailsController@about');

Route::get('/dashboard', 'MainController@dashboard');
Route::get('/listing/{type?}', 'DetailsController@listing');

Route::delete('/delete/{id?}', 'DetailsController@delete_user');
Route::post('/email/{id?}', 'DetailsController@sendEmail');


Route::get('/test', 'PassController@test');
Route::get('/test', 'PassController@test');



