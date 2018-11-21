@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">
        <form action="{{ route('events') }}" method="get" class="mb-4">
        @csrf
            <label for="region-filter">Région</label>
            <select onchange="this.form.submit()" name="region_id" id="region-select" name="region-filter">
                <option >Selectionnez une région</option>
                @foreach($regions as $region)
                    <option value="{{$region->id}}">{{$region->name}}</option>
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
        @if(sizeof($events) > 0)
            @foreach($events as $event)
            
            <div class="col-10">
                <div class="card my-3">
                        <a class="nounderline" href="{{ route('events_show', $event->id) }}" title="{{$event->title}}">
                    <div class="card-header">
                            <h3 class="mt-4 d-inline">{{$event->title}}</h3>
                        <p class="text-right my-auto">
                            <span class="badge p-2 badge-primary">{{ $event->region->name }}</span> A {{$event->location}} le {{$event->date}}
                        </p>
                    </div>
                        </a>
                    <div class="card-body">
                    <p class="my-4">{!! nl2br(e($event->content)) !!}</p> 
                    
                    <p class="text-right">Créé par <a href="{{ route('users_show', $event->author->name) }}" title="{{$event->author->name}} profile">{{$event->author->name}}</a></p>
                    
                    </div>
                </div>
            </div>
            
            @endforeach
        @else
            <p class="text-center">Aucun évènement ne correspond à votre recherche</p>
        @endif
    </div>


    <div class="row">
        <div class="mx-auto">{{ $events->links() }}</div>
        <div class="mx-auto">
            <a class="btn btn-primary" href="{{ route('events_create') }}" title="{{ __('Ajouter un évènement') }}">Ajouter un évènement <i class="fas fa-plus-circle"></i></a>    
        </div>
    </div>

@endsection