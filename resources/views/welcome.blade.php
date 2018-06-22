@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Laratter</h1>
    <nav>
        <ul  class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
        </ul>
    </nav>
</div>   
<div class="row">
    {{-- Utilizamos @forelse y no @foreach para poder realizar alguna accion si la variable pasada por el forelse esta vacia, y en lugar de terminar en @endforeach, escribimos @empty, y luego terminamos o cerramos con @endforelse --}}
    @forelse($messages as $message)
        <div class="col-6">
        <img class="img-thumbnail" src="{{$message['image']}}" alt="">
        <p class="card-text">
            {{ $message['content'] }}
            <a href="/messages/{{ $message['id'] }}">Leer más</a>
        </p>
        </div>
    @empty
        <p>No hay mensajes destacados.</p>
    @endforelse
</div> 
@endsection