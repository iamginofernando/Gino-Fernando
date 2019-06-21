<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->group(function () {
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
    Route::resource('expense', 'ExpenseController');
    Route::resource('expensecategory', 'ExpenseCategController');
    Route::get('dashboard', 'HomeController@index');
});

