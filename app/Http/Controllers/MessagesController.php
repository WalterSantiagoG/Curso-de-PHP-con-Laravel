<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    //No pedimos el id, si no el mensaje
    //https://laravel.com/docs/5.6/routing#route-model-binding
    //Larevel dice, tengo que entregar un Message, con este id que me entregaron por la ruta debo devolver el Message, entonces internamente realiza la consulta con el id entregado y nos pasa lo que le pedimos
    //Se hace esto por en la ruta cuando pasamos /1 /2 el id si el id no existe envia un error, realizando esto no apareces un error 404 not found en lugar del error
    public function show(Message $message)
    {
        //Ir a buscar el Message por ID
        //$message = Message::find($id);
        
        //Una view de un message
        return view('messages.show', [
            'message' => $message,
        ]);
    }

    public function create(Request $request)
    {
        //dd($request->all());
        return 'Created!';
    }
}
