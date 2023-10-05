<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','guest']
    ], function(){

    Route::get('/login',function (){
        return view('auth.login');
    });
    Auth::routes(['verify' => true]);
    Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
    Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

    Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
    Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
});
//Auth::logout();
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){
        Route::post('send/msg','FrontController@sendMessage')->name('sendMailToMe');
        Route::get('thanks/contact','FrontController@thankuContact');
        Route::get('test/mail','FrontController@testMail');
        Route::get('/','FrontController@index');
});
