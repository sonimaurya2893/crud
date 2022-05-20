<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\IndexController;
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



Route::group(["middleware"=>"auth","prefix"=>"admin"],function(){
    Route::get('/dashbord',[IndexController::class, 'index'] )->name("home");
    Route::post("logout",[AuthController::class, 'logout'])->name("logout");

    Route::get("add-post",[IndexController::class, 'postForm'])->name("post.form");
    Route::post("post-save",[IndexController::class, 'postStore'])->name("post.store");    
    Route::get("edit-post/{id}",[IndexController::class, 'edit'])->name("post.edit");
    Route::post("update-post/{id}",[IndexController::class, 'update'])->name("post.update");
    Route::get("delete-post/{id}",[IndexController::class, 'delete'])->name("post.delete");
    Route::get("view-post/{id}",[IndexController::class, 'view'])->name("post.view");

 
});
Route::get("signup",[AuthController::class, 'index'])->name("signup.view");
Route::post("signup",[AuthController::class, 'signup'])->name("signup.store");
Route::get("login",[AuthController::class, 'loginForm'])->name("login.view");
Route::post("login",[AuthController::class, 'login'])->name("login.store");
