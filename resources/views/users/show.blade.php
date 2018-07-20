@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}</h1>
    <a href="{{ $user->username }}/follows" class="btn btn-link">
        Sigue a <span class="badge badge-default">{{ $user->follows->count() }}</span>
    </a>
    <a href="{{ $user->username }}/followers" class="btn btn-link">
        Seguidores <span class="badge badge-default">{{ $user->followers->count() }}</span>
    </a>

    @if(Auth::check())

        @if(Gate::allows('dms', $user))
            <form action="/{{ $user->username }}/dms" method="POST">
                <input type="text" name="message" id="" class="form-control">
                <button type="submit" class="btn btn-success">
                    Enviar DM
                </button>
            </form>
        @endif
        
        @if(Auth::user()->isFollowing($user))
            <form action="/{{ $user->username }}/unfollow" method="POST">
                {{ csrf_field() }}
                @if(session('success'))
                <span class="text-success">{{ session('success') }}</span>
                @endif
                <button class="btn btn-danger">
                    Dejar de seguir
                </button>
            </form>
        @else
            <form action="/{{ $user->username }}/follow" method="POST">
                {{ csrf_field() }}
                @if(session('success'))
                <span class="text-success">{{ session('success') }}</span>
                @endif
                <button class="btn btn-primary">
                    Follow
                </button>
            </form>
        @endif
    @endif

    <div class="row">
        @foreach($user->messages as $message)
            <div class="col-6">
                @include('messages.message')
            </div>
        @endforeach  
    </div>      
@endsection