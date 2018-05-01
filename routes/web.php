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

Route::get('/','WelcomeController@index');//访问根目录
Route::get('about','WelcomeController@about');

// Route::get('issues','IssuesController@index')->name('issues.index');
// Route::get('issues/create','IssuesController@create')->name('issues.create');//create需要放在show的前面,不然永远访问不到,Route是由上至下读取匹配
// Route::post('issues','IssuesController@store')->name('issues.store');
// Route::get('issues/{issue}/edit','IssuesController@edit')->name('issues.edit');
// Route::put('issues/{issue}','IssuesController@update')->name('issues.update');
// Route::get('issues/{issue}','IssuesController@show')->name('issues.show');
// Route::delete('issues/{issue}','IssuesController@destroy')->name('issues.destroy');
Route::resource('issues','IssuesController');

Route::resource('comments','CommentsController',['only'=>'store']);
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::resource('users','UsersController');