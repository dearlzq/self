<?php

use Illuminate\Support\Facades\Route;

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
Route::view('/login','admin.login');
Route::post('/dologin','Admin\LoginController@dologin');//执行添加

Route::prefix('/work')->middleware('CheckLogin')->group(function (){
    Route::get('create','Admin\WorkController@create');//添加
    Route::post('store','Admin\WorkController@store');//执行添加
    Route::get('/','Admin\WorkController@index');//展示
    Route::get('destroy/{id}','Admin\WorkController@destroy');//删除
    Route::get('edit/{id}','Admin\WorkController@edit');//编辑
    Route::post('update/{id}','Admin\WorkController@update');//执行编辑
});


//->middleware('auth')
Route::prefix('/action')->group(function (){
    Route::get('create','Admin\ActionController@create');//添加
    Route::post('store','Admin\ActionController@store');//执行添加
    Route::get('/','Admin\ActionController@index');//展示
    Route::get('destroy/{id}','Admin\ActionController@destroy');//删除
    Route::get('edit/{id}','Admin\ActionController@edit');//编辑
    Route::post('update/{id}','Admin\ActionController@update');//执行编辑
});
