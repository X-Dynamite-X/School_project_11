<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    # shoole Route
    // Route::prefix("subject")->name("subject.")->controller(SubjectController::class)->group(function () {
    //     Route::get("/", "index")->name("index");
    //     Route::get("/{subject}", "show")->name("show");

    //     Route::post("/", "store")->name("store");
    //     Route::put("/edit/{subject}", "update")->name("update");
    //     Route::delete("/delete/{subject}", "destroy")->name("destroy");
    // });
});
Route::prefix("subject")->name("subject.")->controller(SubjectController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::get("/{subject}", "show")->name("show");

    Route::post("/", "store")->name("store");
    Route::put("/edit/{subject}", "update")->name("update");
    Route::delete("/delete/{subject}", "destroy")->name("destroy");
});
require __DIR__ . '/auth.php';
