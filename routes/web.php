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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::middleware(['auth.login'])->get('/', 'Admin\IndexController@index');

Route::any('admin/login', 'Admin\UsersController@login');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth.login'], function ($route) {
    $route->get('home', 'IndexController@home');
    $route->get('index', 'IndexController@index');
    $route->get('logout', 'UsersController@logout');
});


Route::any('admin/test', 'admin\IndexController@test');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


