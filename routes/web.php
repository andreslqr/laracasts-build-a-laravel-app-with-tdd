<?php

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', function() {
    $projects = Project::all();

    return view('projects.index', [
        'projects' => $projects
    ]);
});

Route::post('/projects', function(Request $request) {
    Project::create($request->only('title', 'description'));
});