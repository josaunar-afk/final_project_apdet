<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $projects = Project::all();

    return view('welcome', compact('projects'));
});
// Public Project View Route
Route::get('/projects/view/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show.public');

// Change this line in web.php
Route::get('/dashboard', [ProjectController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Project Routes
    Route::resource('projects', ProjectController::class);
});

require __DIR__.'/auth.php';