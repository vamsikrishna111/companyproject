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



Route::get('/','usercontroller@login');
Route::get('register','usercontroller@register');
Route::post('registerinsert','usercontroller@insertregister');
Route::post('companylogin','usercontroller@companylogin');
 Route::get('dashboard','usercontroller@dashboard');


Route::get('forgetpassword','usercontroller@forgetpassword');
Route::post('conformpassword','usercontroller@conformpassword');

