<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


    Route::prefix("users")->name("user.")->controller(UserController::class)->group(function () {
        Route::get("/", "index")->name("index");
        Route::get("/{user}", "show")->name("show");
        Route::post("/", "store")->name("store");
        Route::put("/edit/{user}", "update")->name("update");
        Route::delete("/delete/{user}", "destroy")->name("destroy");
    });