<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/admin',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Auth::routes();
        Auth::routes(['verify' => true]);

    });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/admin',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ,'verified']
    ], function(){
    route::get('/','HomeController@index');
    Route::get('logout', function ()
    {
        auth()->logout();
        Session()->flush();

        return Redirect::to(LaravelLocalization::setLocale());
    })->name('logout');
    route::get('/dashboard','HomeController@index')->name('dashboard');
    Route::resource('grades','GradeController');
    route::get('notAllowed','HomeController@notallowed')->name('notallowed');
    Route::resource('permissions', 'PermissionController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::get('add/user/permission/{id}', 'UserController@add_permission')->name('add_user_permission');
    Route::post('save/direct/permission','UserController@saveDirectPermission')->name('save_direct_permission');
    Route::get('send-email','MailController@sendEmail');
    Route::get('/{page}', 'AdminController@index');
});

