<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerSlider;
use App\Http\Controllers\ControllerNoticias;
use App\Http\Controllers\ControllerGaleria;
use App\Http\Controllers\ControllerContactos;

use App\Models\Slide;
use App\Models\Noticia;


Route::get('/', function () {
    $data = Slide::all();
    return view('modules.admin.slides.index', compact('data'));
})->name('admin.index');

Route::get('/app', function () {
    $data = Slide::all();
    $noticias = Noticia::topTresRecientes();
    return view('modules.landing.slides.index', compact('data', 'noticias'));
})->name('landing.index');


Route::resource('slides', ControllerSlider::class);
Route::resource('noticias', ControllerNoticias::class);
Route::resource('galeria', ControllerGaleria::class);
Route::resource('contacto', ControllerContactos::class);
