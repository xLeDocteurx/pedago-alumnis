@extends('layouts.app')

@section('content')


    <div class="container">
        
        <div class="row">
            <form action="{{ route('events_filter') }}" method="get" class="mb-4">
            @csrf
            
            <label for="textfilter">Recherche globale</label>
            <input type="text">
            
            <label for="techno-filter">Technologies</label>
            <select name="Technos" id="" name="techo-filter">
            <option value="php">PHP</option>
            <option value="Javascript">Javascript</option>
            <option value="laravel">laravel</option>
            <option value="Symfony">Symfony</option>
            </select>

            <label for="city-filter">Ville</label>
            <select name="Technos" id="" name="city-filter">
            <!-- probleme ici, comment afficher une seule fois une ville si elle existe sur plusieurs evenements -->
                @foreach($eventlist as $event)
                <option value="{{$event->location}}">{{$event->location}}</option>
                @endforeach
            </select>

            </form>
        </div>

    <div class="row">
        <div class="mx-auto">{{ $events->links() }}</div>
        <div class="mx-auto">
            <a class="btn btn-primary" href="{{ route('events_create') }}" title="{{ __('Ajouter un évènement') }}">Ajouter un évènement <i class="fas fa-plus-circle"></i></a>    
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach($events as $event)
        
        <div class="col-10">
            <div class="card my-3">
                    <a class="nounderline" href="{{ route('events_show', $event->id) }}" title="{{$event->title}}">
                <div class="card-header">
                        <h3 class="mt-4 d-inline">{{$event->title}}</h3>
                    <p class="text-right my-auto"> A {{$event->location}} le {{$event->date}}</p>
                </div>
                    </a>
                <div class="card-body">
                <p class="my-4">{{$event->content}}</p> 
                
                <p class="text-right">Créé par <a href="{{ route('users_show', $event->author->id) }}" title="{{$event->author->name}} profile">{{$event->author->name}}</a></p>
                
                </div>
            </div>
        </div>
        
        @endforeach
    </div>


    <div class="row">
        <div class="mx-auto">{{ $events->links() }}</div>
        <div class="mx-auto">
            <a class="btn btn-primary" href="{{ route('events_create') }}" title="{{ __('Ajouter un évènement') }}">Ajouter un évènement <i class="fas fa-plus-circle"></i></a>    
        </div>
    </div>

@endsection