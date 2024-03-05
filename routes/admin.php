<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', 'AuthAdminController@login')->name('login');
    Route::post('/login', 'AuthAdminController@CheckLogin');
    Route::get('/logout', 'AuthAdminController@logout');

    Route::get('/forgot/password', 'AuthAdminController@ForgotPassword');
    Route::post('/forgot/password', 'AuthAdminController@SendPassword');

    //Error
    Route::get('/error', 'HomeController@error');
    //Home
    Route::get('/home', 'HomeController@Home');


    //Setting
    Route::get('/settings', 'SettingsController@index');
    Route::post('/settings', 'SettingsController@update');


    // Admins
    Route::resource('/admins', 'AdminController');
    Route::get('/profile', 'AdminController@profile');
    Route::post('/profile', 'AdminController@profileUpdate');

    // roles
    Route::resource('/roles', 'RoleController');
    Route::post('/roles/edit/{role}', 'RoleController@edit');

    //Admin Backup
    Route::get('/backup', 'BackupController@index');
    Route::get('/backup/create', 'BackupController@create');
	Route::get('/backup/download/{file}', 'BackupController@download');
	Route::post('/backup/delete', 'BackupController@delete');
	Route::get('/db-restore/{file}', 'BackupController@restore');

});
