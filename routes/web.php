<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Route::group(['prefix'=>'admin'], function(){
    Route::get('/',[App\Http\Controllers\Backend\BackendController::class, 'index']);
    
});