<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ClientController;


/**
 * Rotas Principais
 */
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/',  function () {
        return view('admin.pages.startPages.index');
    })->name('pontesdev');
    Route::get('/login',  function () {
        return view('admin.pages.startPages.login');
    })->name('login');
    Route::get('/test',  function () {
         //User::factory()->count(30)->create();    
    });
    Route::post('/login', ['uses' => 'LoginController@authenticate']);

    Route::get('/logout', ['uses' => 'LoginController@logout']);

    Route::get('/dashboard/main', ['uses' => 'UserController@main'])->name('main')->middleware('auth');

    Route::get('/dashboard/profile', ['uses' => 'UserController@profile'])->middleware('auth');
    
    Route::get('/dashboard/profile/photo', ['uses' => 'UserController@photo'])->middleware('auth');

    Route::post('/dashboard/profile/photo', ['uses' => 'UserController@setPhoto'])->name('user_set_photo')->middleware('auth');

    Route::get('/dashboard/profile/photo/delete', ['uses' => 'UserController@deletePhoto'])->middleware('auth');

    Route::get('/dashboard/profile/password', ['uses' => 'UserController@password'])->middleware('auth');

    Route::post('/dashboard/profile/password', ['uses' => 'UserController@setPassword'])->name('user_set_password')->middleware('auth');
    
});

/**
 * Rotas Dashboard
 */

Route::resource('/dashboard/users', UserController::class)->middleware('auth');

Route::resource('/dashboard/leads', LeadController::class);

Route::resource('/dashboard/services', ServiceController::class)->middleware('auth');

Route::resource('/dashboard/clients', ClientController::class)->middleware('auth');


/**
 * Rotas Para pesquisas alternativas por nome.
 */
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('/dashboard/users/find', ['uses' => 'UserController@find'])->name('find-user')->middleware('auth');
    Route::post('/dashboard/leads/find', ['uses' => 'LeadController@find'])->name('find-lead')->middleware('auth');
    Route::post('/dashboard/services/find', ['uses' => 'ServiceController@find'])->name('find-service')->middleware('auth');
    Route::post('/dashboard/clients/find', ['uses' => 'ClientController@find'])->name('find-client')->middleware('auth');
});