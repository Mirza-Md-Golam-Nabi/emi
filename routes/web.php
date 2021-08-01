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

Route::post('/log-in', 'LoginController@login')->name('admin.login');
Route::get('/regis', 'LoginController@register')->name('admin.register');
Route::post('/regis', 'LoginController@registerStore')->name('admin.register.store');

Route::group(['prefix'=>'admin'], function(){
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/loan-applicant', 'AdminController@loanApplicant')->name('admin.loan.applicant');
    Route::get('/loan-applicant-list', 'AdminController@loanApplicantList')->name('admin.loan.applicant.list');
    Route::get('/loan-approve-{id}', 'AdminController@loanApprove')->name('loan.approve');
    Route::get('/loan-reject-{id}', 'AdminController@loanReject')->name('loan.reject');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loan', 'FrontendController@loanApply')->name('loan.apply');
Route::post('/loan', 'FrontendController@loanStore')->name('loan.store');
Route::get('/loan/list', 'FrontendController@loanList')->name('loan.list');
Route::get('/loan-details', 'FrontendController@loanDetails')->name('loan.details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
