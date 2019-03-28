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

// Route::get('/task', function () {
//     return view('task');
// });

Route::middleware("web")->namespace('Etieneabasi\MyTaskManager\Controllers')->group(function () {
Route::post('task','CategoryController@show');
Route::get('task/store','TaskController@store')->name("task.store");
Route::get('task/store','CategoryController@store')->name("category.store");
Route::post('task/update/{id}','CategoryController@update')->name("category.update");
Route::get('category/delete/{id}','CategoryController@destroy')->name("cat.destroy");
Route::post('task/delete/{id}','TaskController@destroy')->name("tasks.destroy");
Route::get('task','TaskController@index')->name("tasks.index");
Route::get('task/store/category','TaskController@storeCat')->name("category.store");
Route::get('task/store','TaskController@store')->name("task.store");
Route::post('task/check','TaskController@checkFunction')->name("task.check");
Route::post('task/updateTask/{id}','TaskController@updateTask')->name("task.updateTask");

});





