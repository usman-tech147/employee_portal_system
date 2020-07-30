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

//Route::get('/teacher/evaluation/portal', function () {
//    return view('portal_login');
//});

//Auth::routes();

//Route::auth();
//Route::get('/teacher/evaluation/portal','Auth\LoginController@showLoginForm')->name('login');


Route::get('/','HomeController@index')->name('home');
Route::get('/back','HomeController@back')->name('back');

//Route::get('/teacher/evaluation/portal/hr/dashboard', 'HomeController@index')->name('home');
Route::get('/teacher/evaluation/portal/hr/dashboard', 'HR\HrController@dashboard')->name('hr.dashboard');
Route::get('/teacher/evaluation/portal/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/teacher/evaluation/portal/login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
