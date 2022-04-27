<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
//register
Route::get('/register',[RegisterController::class,'index'])->name('register.index');
//store
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
//login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
//store
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function(){
//logout
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

//create and store
Route::get('/blogs/create',[BlogController::class,'create'])->name('blogs.create');
Route::post('/blogs/store',[BlogController::class,'store'])->name('blogs.store');

//category
Route::get('/category/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('categories.store');

});

Route::middleware('roleModel')->group(function(){
    //edit and update
Route::get('/blogs/edit/{blog}',[BlogController::class,'edit'])->name('blogs.edit');
Route::put('/blogs/edit/{blog}',[BlogController::class,'update'])->name('blogs.update');

//delete
Route::get('/blogs/delete/{blog}',[BlogController::class,'destroy'])->name('blogs.delete');
});

//index
Route::get('/',[BlogController::class,'index'])->name('index');

//show
Route::get('/blogs/show/{blog}',[BlogController::class,'show'])->name('blogs.show');
