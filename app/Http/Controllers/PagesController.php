<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class PagesController extends Controller
{
    public function home()
    {
        //Cambiamos all() por paginate(), para paginar los mensajes
        $messages = Message::paginate(10);//Parametro para decir cuanto mensaje quieres paginar, por defecto coloca 15
        //dd($messages);
        return view('welcome', [
            'messages' => $messages,
        ]);
    }
}
