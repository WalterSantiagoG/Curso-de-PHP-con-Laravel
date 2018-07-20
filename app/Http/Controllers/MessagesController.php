<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests\CreateMessageRequest;

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

    public function create(CreateMessageRequest $request)
    {
        //Para validar vamos a usar el metodo validate del controller de laravel, este metodo ya viene en el controller que nosotros extendemos
        //validate() recibe 3 parametros, Request, array de reglas
        /*$this->validate($request, [
            'message' => ['required','max:160']
        ],[
            'message.required' =>  'Por favor, escribe tu mensaje.',
            'message.max' => 'El mensaje no puede superar los 160 caracteres.'
        ]);*/

        $user = $request->user();
        $image = $request->file('image');

        $message = Message::create([
            'user_id' => $user->id,
            'content' => $request->input('message'),
            'image'   => $image->store('messages','public')
        ]);

        return redirect('/messages/'.$message->id);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $messages = Message::with('user')->where('content', 'LIKE', "%$query%")->get();

        return view('messages.index',[
            'messages' => $messages,
        ]);
    }
}
