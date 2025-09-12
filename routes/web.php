<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;

/*
Frontend Routes
*/

Route::get('/',[FrontendController::class,'index'])->name('about');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/services',[FrontendController::class,'services'])->name('services');
Route::get('/contact',[ContactController::class,'contact'])->name('contact.index');
Route::post('/contact',[ContactController::class,'contact'])->name('contact.store');
