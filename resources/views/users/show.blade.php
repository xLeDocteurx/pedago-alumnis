@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            
            <div class="col-10">
                <div class="card my-4">
                    <div class="card-header">
                            <h3 class="mt-2"> {{$user->name}}</h3>
                            <!-- <p class="text-right my-auto"> A {{$user->location}} le {{$user->date}}</p> -->
                    </div>
                    <div class="card-body">

                        @foreach($user->roles as $role)
                            <p class="my-4">{{$role->name}}</p> 
                        @endforeach

                        <p class="my-4">
                            <h4>Mes évènements :</h4>
                            @foreach($myEvents as $event)
                                <a class="nounderline" href="{{ route('events_show', $event->id) }}" title="{{$event->name}}">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                                    <h4 class="mt-4 d-inline">{{$event->title}}</h4>
                                                <!-- <p class="text-right my-auto"> A {{$event->location}} le {{$event->date}}</p> -->
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </p> 

                        <p class="my-4">
                            <h4>Les évènements qui m'intéressent :</h4>
                            @foreach($events as $event)
                                <a class="nounderline" href="{{ route('events_show', $event->id) }}" title="{{$event->name}}">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                                    <h4 class="mt-4 d-inline">{{$event->title}}</h4>
                                                <!-- <p class="text-right my-auto"> A {{$event->location}} le {{$event->date}}</p> -->
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </p> 

                    </div>
                    <div class="card-action text-right">
                        @if ($user->id !== Auth::user()->id)
                                @if ($user->isFriend)
                                    <a class="btn btn-outline-primary" href="{{ route('contacts_removeFriend', $user->id) }}" title="Retirer de mes contacts">Retirer de mes contacts <i class="fas fa-user-friends"></i></a>
                                @else
                                    <a class="btn btn-outline-primary" href="{{ route('contacts_addFriend', $user->id) }}" title="Ajouter à mes contacts">Ajouter à mes contacts <i class="fas fa-user-friends"></i></a>
                                @endif
                        @endif
                    </div>
                </div>
            </div>
            
        </div>    
    
    </div>

@endsection