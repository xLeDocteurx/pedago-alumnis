@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        
    <div class="row">
        <div class="mx-auto">{{ $users->links() }}</div>
    </div>

    <div class="row justify-content-center">
        @foreach($users as $user)
        
        <div class="col-md-8">
            <a class="nounderline" href="{{ route('users_show', $user->id) }}" title="{{$user->name}}">
                <div class="card my-3">
                    <div class="card-header">
                                <h4 class="mt-4 d-inline">{{$user->name}}</h4>
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