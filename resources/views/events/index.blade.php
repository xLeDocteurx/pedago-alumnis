@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        
    <div class="row">
        <div class="mx-auto">{{ $events->links() }}</div>
        <div class="mx-auto">
        <a class="btn btn-primary" href="{{ route('events_create') }}" title="{{ __('Add an event') }}">Add an event <i class="fas fa-plus-circle"></i></a>    
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach($events as $event)
        
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">
                        <a href="{{ route('events_show', $event->id) }}" title="{{$event->title}}"><h3 class="mt-4 d-inline">{{$event->title}}</h3></a>
                    
                        <p class="text-right my-auto"> à {{$event->location}} Le {{$event->date}}</p>
                </div>
                <div class="card-body">
                <p class="my-4">{{$event->content}}</p> 
                
                <p class="text-right">Créer par {{$event->author->name}}</p>
                
                </div>
            </div>
        </div>
        
        @endforeach
    </div>


    <div class="row">
        <div class="mx-auto">{{ $events->links() }}</div>
        <div class="mx-auto">
            <a class="btn btn-primary" href="{{ route('events_create') }}" title="{{ __('Add an event') }}">Add an event <i class="fas fa-plus-circle"></i></a>    
        </div>
    </div>

@endsection