@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            
            <div class="col-10">
                <div class="card my-4">
                    <div class="card-header">
                    
                            @if ($event->author->id === Auth::user()->id)
                                <a class="btn btn-danger" href="{{ route('events_delete', $event->id) }}" title="{{ __('Supprimer l\'évènement') }}">Supprimer l'évènement <i class="fas fa-trash"></i></a>
                                <a class="btn btn-warning" href="{{ route('events_update', $event->id) }}" title="{{ __('Modifier')}}">Modifier<i class="fas fa-edit"></i></a>
                                
                            @endif
                            <h3 class="mt-3"> {{$event->title}}</h3>
                        
                            <p class="text-right my-auto"> 
                            <span class="badge p-2 badge-secondary"> {{$event->region->name}}</span> A {{$event->location}} le {{$event->date}}</p>

                    </div>
                    <div class="card-body">
                        <p class="my-4">
                            {!! nl2br(e($event->content)) !!}
                        </p> 
                        <p class="text-right">
                            Créé par 
                            <a href="{{ route('users_show', $event->author->name) }}" title="{{$event->author->name}} profile">
                                {{$event->author->name}}
                            </a>
                        </p>
                        <p class="my-4">
                            <h4>Personnes intéressées :</h4>

                            @foreach($event->subscribers as $subscriber)
                                <a class="nounderline" href="{{ route('users_show', $subscriber->name) }}" title="{{$subscriber->name}}">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                                    <h4 class="mt-4 d-inline">{{$subscriber->nom}} {{$subscriber->prenom}}</h4>
                                                <!-- <p class="text-right my-auto"> A {{$subscriber->location}} le {{$subscriber->date}}</p> -->
                                                <!-- @if($user->region)
                                                    <span class="text-left badge p-2 badge-secondary">{{$user->region->name}}</span>
                                                @endif
                                                @foreach($user->roles as $role)
                                                    <span class="text-left badge p-2 badge-primary">{{$role->name}}</span>
                                                @endforeach -->
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </p> 
                    </div>
                    <div class="card-action text-right">
                            @if ($event->author->id !== Auth::user()->id)
                                @if ($event->participating)
                                    <a class="btn btn-outline-primary" href="{{ route('events_unsubscribe', $event->id) }}" title="{{ __('Je ne suis plus intéressé') }}">Je ne suis plus intéressé <i class="fa fa-star"></i></a>
                                @else
                                    <a class="btn btn-primary" href="{{ route('events_subscribe', $event->id) }}" title="{{ __('Je suis intéressé') }}">Je suis intéressé <i class="far fa-star"></i></a>
                                @endif
                            @endif
                    </div>
                </div>
            </div>
            
        </div>    
    
    </div>

@endsection