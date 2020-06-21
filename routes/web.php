<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/email', function () {
    Mail::to('email@email.com')->send(new WelcomeMail());
    return new WelcomeMail();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sendverification', 'HomeController@verification')->name('sendverification');
Route::get('/checkcode', 'HomeController@checkcode')->name('checkcode');
Route::get('/updateuser', 'HomeController@updateuser')->name('checkcode');
