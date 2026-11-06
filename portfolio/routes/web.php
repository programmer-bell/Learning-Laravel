<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = [
        [
            'title' => 'Project 1',
            'description' => 'Description of project 1',
            'image' => '/images/project1.jpg',
            'link' => '/projects/project1',
        ],
        [
            'title' => 'Project 2',
            'description' => 'Description of project 2',
            'image' => '/images/project2.jpg',
            'link' => '/projects/project2',
        ],
    ];

    return view('home', ['name' => 'Bell', 'projects' => $projects]);
});

Route::get('/about', function () {
    return view('about');
});