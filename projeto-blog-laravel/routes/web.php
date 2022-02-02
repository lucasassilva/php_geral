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

Route::get("/", [\App\Http\Controllers\HomeController::class, "index"])->name("post_index");
Route::get("/create", [\App\Http\Controllers\HomeController::class, "add"])->name("post_add");
Route::post("/create",  [\App\Http\Controllers\HomeController::class, "create"])->name("post_create");
Route::post("/delete/{id}",  [\App\Http\Controllers\HomeController::class, "delete"])->name("post_delete");
Route::get("/update/{id}", [\App\Http\Controllers\HomeController::class, "show"])->name("post_show");
Route::post("/update", [\App\Http\Controllers\HomeController::class, "update"])->name("post_update");
