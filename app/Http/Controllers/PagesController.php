<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        //Key: url, Value: texto que queremos mostrar
        $links = [
            'https://platzi.com/laravel' => 'Curso de laravel',
            'https://laravel.com' => 'Pagina de Laravel'
        ];

        return view('welcome', [
            'teacher' => 'Walter Santiago',
            'links'   => $links,
        ]);
    }

    public function aboutUs(){
        return view('about');
    }
}
