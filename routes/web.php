<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

Route::group(['namespace' => 'Web'], static function () {
    Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@index']);
    Route::get('login', ['as' => 'login', 'uses' => 'AuthController@showLoginForm']);
    Route::post('login', ['as' => 'do.login', 'uses' => 'AuthController@login']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

    Route::group(['middleware' => 'auth'], static function () {
        Route::get(
            'email/verify',
            ['as' => 'verification.notice', 'uses' => 'RegisterController@showEmailVerify']
        );
        Route::get(
            'email/verify/{id}/{hash}',
            ['as' => 'verification.verify', 'uses' => 'RegisterController@verifyEmail']
        )->middleware('signed');

        Route::group(['middleware', 'verified'], static function () {
        });
    });
});
