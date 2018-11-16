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
                        
                        @if ($event->author->id === Auth::user()->id)
                            <a class="btn btn-danger" href="{{ route('events_delete', $event->id) }}" title="{{ $event->title }}">{{ __('Delete') }} <i class="fas fa-trash"></i></a>
                        @else
                            <p>Créer par {{$event->author->name}}</p>
                        @endif
                    </div>
                    <div class="card-action text-right">
                        <a class="btn btn-primary" href="{{ route('events_subscribe', $event->id) }}" title="{{ __('Je suis intéressé') }}">{{ __('Je suis intéressé') }}</a>
                    </div>
                </div>
            </div>
            
        </div>    
    
    </div>

@endsection