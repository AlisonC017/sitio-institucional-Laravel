<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('modules.admin.index');
});

Route::get('/app', function () {
    return view('modules.landing.index');
});
