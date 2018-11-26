@extends('layouts.app')

@section('content')

    <div class="container">
        
    <div class="row">
        <div class="mx-auto">{{ $users->links() }}</div>
    </div>

    <div class="row justify-content-center">
        @foreach($users as $user)
        
        <div class="col-10">
            <a class="nounderline" href="{{ route('users_show', $user->name) }}" title="{{$user->nom}} {{$user->prenom}}">
                <div class="card my-3">
                    <div class="card-header">
                        <img class="mx-auto rounded-circle" src="{{ asset($user->image_url) }}" alt="Avatar de l'utilisateur" style="max-width: 50px;">
                        <h4 class="mt-4 d-inline">{{$user->nom}} {{$user->prenom}}</h4>
                    
                        @foreach($user->tags as $tag)
                            <span class="text-left badge p-2 badge-success">{{$tag->name}}</span>
                        @endforeach   

                        @if($user->region)
                            <span class="text-left badge p-2 badge-secondary">{{$user->region->name}}</span>
                        @endif
                        @foreach($user->roles as $role)
                            <span class="text-left badge p-2 badge-primary">{{$role->name}}</span>
                        @endforeach
                        <!-- <p class="text-right my-auto"> A {{$user->location}} le {{$user->date}}</p> -->
                    </div>
                </div>
            </a>
        </div>
        
        @endforeach
    </div>


    <div class="row">
        <div class="mx-auto">{{ $users->links() }}</div>
    </div>

@endsection