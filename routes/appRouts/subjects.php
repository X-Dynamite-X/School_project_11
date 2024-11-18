<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;

Route::prefix("subject")->name("subject.")->controller(SubjectController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::get("/{subject}", "show")->name("show");
    Route::post("/", "store")->name("store");
    Route::put("/edit/{subject}", "update")->name("update");
    Route::delete("/delete/{subject}", "destroy")->name("destroy");
});
