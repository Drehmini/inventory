<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', function () {
        return redirect()->route('inventory.index');
    });
    Route::resource('inventory/transactions', 'TransactionController');
    Route::get('inventory/transactions/checkout/{id}',
        ['as' => 'inventory.transactions.checkout', 'uses' => 'TransactionController@checkout']);
    Route::post('inventory/transactions/checkout/{id}',
        ['as' => 'inventory.transactions.store', 'uses' => 'TransactionController@store']);
    Route::get('inventory/transactions/checkin/{id}',
        ['as' => 'inventory.transactions.checkin', 'uses' => 'TransactionController@checkin']);
    Route::resource('inventory', 'EquipmentController');
    Route::resource('person', 'PersonController');
});

Route::group(['middleware' => 'web'], function () {
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLoginAD');
    Route::get('logout', 'Auth\AuthController@getLogout');
});
