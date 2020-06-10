<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('inicios','InicioController');
Route::resource('actividads','ActividadController');
Route::resource('evaluacions','EvaluacionController');
Route::resource('luneros','LuneroController');

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'UserController@details');
});

Route::post('admins', 'AdministradorController@admin');
Route::post('registerAdmins', 'AdministradorController@registerAdmin');
Route::group(['middleware' => 'auth:administrador'], function(){
    Route::post('details', 'AdministradorController@details');    });
    