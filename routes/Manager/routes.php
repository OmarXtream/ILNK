<?php

use App\Http\Controllers\Manager\HomeController;
use Illuminate\Support\Facades\Route;

Route::post('Mlogout', 'Manager\AuthController@ManagerLogout')->name('manager.logout');
Route::post('Mlogin', 'Manager\AuthController@postLogin')->name('manager.Mlogin');
## Manager Routes
Route::group(['namespace' => 'Manager', 'prefix' => 'manager'], function () {

    Route::GET('login', function () {
        return view('manager.login');
    })->name('ManagerLogin');



    Route::group(['middleware' => ['is.manager']], function () {
        ########## Start home page - users
        Route::get('/', 'HomeController@index')->name('managerHome');
        Route::get('users', 'HomeController@users')->name('manager.users');
        ########## End home page - users



    });
});
