<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeadController;
use App\Models\User;


/**
 * Rotas Principais
 */
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', function(){
        return view('admin.pages.startPages.index');
    });
    Route::get('/login',  function(){
        return view('admin.pages.startPages.login');
    })->name('login');
    Route::get('/test',  function(){
       // User::factory()->count(30)->create(); 
    });
    Route::post('/login',['uses' => 'LoginController@authenticate']);

    Route::get('/logout',['uses' => 'LoginController@logout']);

    Route::get('/dashboard/main',['uses' => 'UserController@main'])->name('main')->middleware('auth');
});
/**
 * Rotas Dashboard
 */

Route::resource('/dashboard/users',UserController::class)->middleware('auth');

Route::resource('/dashboard/leads',LeadController::class)->middleware('auth');


/**
 * Rotas Para pesquisas alternativas por nome.
 */
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::post('/dashboard/users/find',['uses' => 'UserController@find'])->name('find-user')->middleware('auth');
    Route::post('/dashboard/leads/find',['uses' => 'LeadController@find'])->name('find-lead')->middleware('auth');
});
