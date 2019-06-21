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

Auth::routes();
Route::get('/',                     'NavigationController@home')->name('main');
Route::get('/home',                     'NavigationController@home')->name('main');
Route::post('/user/update/account',   'UserController@updateAccount')->name('updateaccount');
Route::group(array('prefix' => 'admin'), function () {
    Route::get('users',         'NavigationController@users')->name('users');
    Route::get('roles',         'NavigationController@role')->name('role');
    Route::get('expense',       'NavigationController@expense')->name('expense');
    Route::get('expensecateg',  'NavigationController@expenseCateg')->name('expensecateg');
    Route::get('home',          'NavigationController@home')->name('home');

});
