<?php

use Illuminate\Support\Facades\Route;

Route::get("/", [\App\Http\Controllers\AddressController::class, "index"])->name("view.address");

Route::prefix("address")->group(function () {
    Route::post("/create", [\App\Http\Controllers\AddressController::class, "create"])->name("create.address");
    Route::delete("/delete/{id}", [App\Http\Controllers\AddressController::class, "delete"])->name("delete.address");
});

Route::prefix("api")->group(function () {
    Route::get("/cep/{cep}", [App\Http\Controllers\APIController::class, "index"]);
});
