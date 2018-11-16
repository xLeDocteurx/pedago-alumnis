@extends('layouts.app')

@section('content')

    <div class="container-fluid">

    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">
                        <h3 class="mt-4 d-inline"> {{$event->title}}</h3>
                    
                        <p class="text-right my-auto"> à {{$event->location}} Le {{$event->date}}</p>
                </div>
                <div class="card-body">
                <p class="my-4">{{$event->content}}</p> 
                
                <p class="text-right">Créer par {{$event->author->name}}</p>
                
                </div>
            </div>
        </div>
        
    </div>

    
    </div>

@endsection