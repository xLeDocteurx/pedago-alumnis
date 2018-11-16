@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        
    <div class="row justify-content-center">
        @foreach($events as $event)
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">{{$event->title}}</div>
                <div class="card-body my-4">
                {{$event->content}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
        

    
    </div>

@endsection