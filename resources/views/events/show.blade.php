@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="row justify-content-center">
            
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-header">
                            @if ($event->author->id === Auth::user()->id)
                                <a class="btn btn-danger" href="{{ route('events_delete', $event->id) }}" title="{{ __('Supprimer l\'évènement') }}">Supprimer l'évènement <i class="fas fa-trash"></i></a>
                            @endif
                            <h3 class="mt-4"> {{$event->title}}</h3>
                        
                            <p class="text-right my-auto"> à {{$event->location}} Le {{$event->date}}</p>

                    </div>
                    <div class="card-body">
                        <p class="my-4">{{$event->content}}</p> 
                        <p>Créer par {{$event->author->name}}</p>
                    </div>
                    <div class="card-action text-right">
                        <!-- Si déja intéresser afficher un bouton pour défaire la relation -->
                        <a class="btn btn-outline-primary" href="{{ route('events_subscribe', $event->id) }}" title="{{ __('Je suis intéressé') }}">Je suis intéressé <i class="far fa-star"></i></a>
                    </div>
                </div>
            </div>
            
        </div>    
    
    </div>

@endsection