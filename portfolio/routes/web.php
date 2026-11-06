<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = Project::latest()->get();

    return view('home', ['name' => 'Bell', 'projects' => $projects]);
});

Route::get('/about', function () {
    return view('about');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', ProjectController::class)->except(['show']);
});
