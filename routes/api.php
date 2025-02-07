<?php

use App\Controllers\CarController;

// Router::get('/', [CarController::class, 'index']);
Router::get('/', [CarController::class, 'index'])
    ->setName('home')
    ->setMiddlewaire('Auth');

Router::get('/edit/{id}', [CarController::class, 'edit']);

Router::get('/contact', function(){
    return "Hello";
});


