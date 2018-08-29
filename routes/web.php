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


Route::middleware(['auth.login'])->get('/', 'Admin\IndexController@home');

Route::get('admin/login', 'Admin\UsersController@showLoginForm');
Route::post('admin/login', 'Admin\UsersController@login');
Route::get('admin/logout', 'Admin\UsersController@logout')->name('logout');
Route::any('admin/myselfregister', 'Admin\RegisterController@register')->name('myselfregister');
Route::get('admin/register', 'Admin\RegisterController@showRegistrationForm')->middleware('is.superadministrator');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth.login','is.administrator']], function ($route) {
    $route->get('home', 'IndexController@home');
    $route->get('index', 'IndexController@index');
    $route->get('getadmins', 'UsersController@adminsList');




    $route::group([], function ($rout) {
        $rout->any('adminsForgetpwd', 'UsersController@adminsForgetpwd');
    });
});


Route::any('admin/test', 'admin\IndexController@test');
Route::any('admin/uploadFileAjax', 'admin\IndexController@uploadFileAjax');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

