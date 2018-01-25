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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/appointment', 'AppointmentController');
//Route::get('/medical', 'HomeController@index')->name('medical');

Route::get('/medical', [
        'uses' => 'HomeController@medicalPage',
        'as' => 'medical',
        'middleware' => 'roles',
        'roles' => ['administrator', 'doctor']
    ]);

/*
Route::resource('/appointment', [
        'uses' => 'HomeController@index',
        'as' => 'appointment'
    ]);*/

Route::get('/admin', [
        'uses' => 'HomeController@adminPage',
        'as' => 'admin',
        'middleware' => 'roles',
        'roles' => ['administrator']
    ]);

Route::post('/admin/assign-roles', [
        'uses' => 'HomeController@adminAssignRoles',
        'as' => 'admin.assign',
        'middleware' => 'roles',
        'roles' => ['administrator']
    ]);

Route::get('/email', [
        'uses' => 'HomeController@adminEmailReminder',
        'as' => 'email',
        'middleware' => 'roles',
        'roles' => ['administrator']
    ]);


Route::get('welcome/{locale}', function ($locale) {
        App::setLocale($locale);

        //
    });
