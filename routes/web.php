<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //Key: url, Value: texto que queremos mostrar
    $links = [
        'https://platzi.com/laravel' => 'Curso de laravel',
        'https://laravel.com' => 'Pagina de Laravel'
    ];
    return view('welcome', [
        'teacher' => 'Walter Santiago',
        'links'   => $links,
    ]);
});

Route::get('acerca', function(){
    return view('about');
});
