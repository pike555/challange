<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::any('/test','member@test')->name('test');
Route::get('/login','member@getLogin')->name('login');
Route::post('/login','member@postLogin');
Route::any('/logout','member@Logout')->name('logout');

Route::group(['middleware'=>['checkuser']],function(){
  Route::group(['middleware'=>['checkadmin']],function(){
    Route::get('/announce','AdminController@getMain')->name('announce');
    Route::get('/add-announce','AdminController@getAdd')->name('addannounce');
    // Route::post('/add-announce','AdminController@postAdd');
    // Route::get('/edit-announce','AdminController@getEdit')->name('editannounce');
    // Route::post('/add-announce','AdminController@postAdd');
    // Route::any('/delete-announce','AdminController@getEdit')->name('deleteannounce');
  });

  Route::get('/main','MainController@getMain')->name('main');
  Route::get('/role','MainController@getRole')->name('role');
  Route::post('/role','MainController@postRole');
});
