<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;




Route::get('/',[SiteController::class,'index'])->name('site.index');

Route::prefix('/admin')->name('admin.')->middleware(['auth','is_admin'])->group(function(){
    // Route::get('/',[AdminController::class,'index'])->name('index');
    // Route::resource('/categories',[CategoryController::class,'index'])->name('category');
    // Route::resource('/meals',[MealController::class,'index'])->name('category');
});
