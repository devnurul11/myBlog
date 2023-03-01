<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;

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


Route::get('/',[FrontendController::class, 'index'])->name('front.index');

    Route::group(['prefix'=>'admin'], function(){
        Route::get('/',[BackendController::class, 'index'])->middleware(['auth', 'verified']) ->name('back.index');
        Route::resource('/category', CategoryController::class)->middleware(['auth', 'verified']);
        Route::resource('/sub-category', SubCategoryController ::class)->middleware(['auth', 'verified']);
        Route::resource('/tag', TagController::class)->middleware(['auth', 'verified']);
    });
    //category routes

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController   ::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController ::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //category routes
    

});



require __DIR__.'/auth.php';
