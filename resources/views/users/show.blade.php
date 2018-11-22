@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            
            <div class="col-10">
                <div class="card my-4">
                    <div class="card-header text-center">
                            <img class="mx-auto rounded-circle" src="{{ asset($user->image_url) }}" alt="User avatar" style="max-width: 150px;">
                            <h3 class="mt-2"> {{$user->name}}</h3>
                            @if ($user->id === Auth::user()->id)
                                <a class="btn btn-warning" href="{{ route('users_update', Auth::user()->id) }}" title="Editer le profil">Editer le profil</a>
                            @endif
                            <!-- <p class="text-right my-auto"> A {{$user->location}} le {{$user->date}}</p> -->
                    </div>
                    <div class="card-body">
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="annonces-tab" data-toggle="tab" href="#annonces" role="tab" aria-controls="annonces" aria-selected="false">Mes annonces</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="evenements-tab" data-toggle="tab" href="#evenements" role="tab" aria-controls="evenements" aria-selected="false">Mes évènements</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="interests-tab" data-toggle="tab" href="#interests" role="tab" aria-controls="interests" aria-selected="false">Les évènements qui m'intéressent</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @if($user->region)
                                    <span class="text-left badge p-2 badge-secondary">{{$user->region->name}}</span>
                                @endif
                                @foreach($user->roles as $role)
                                    <span class="text-left badge p-2 badge-primary">{{$role->name}}</span>
                                @endforeach
                                <h4>Ma bio :</h4>
                                <p class="my-4">{!! nl2br(e($user->bio)) !!}</p>
                            </div>
                            <div class="tab-pane fade" id="annonces" role="tabpanel" aria-labelledby="annonces-tab">
                                <p class="my-4">
                                    <h4>Mes Annonces :</h4>
                                    @foreach($myJobs as $job)
                                        <a class="nounderline" href="{{ route('annonces_show', $job->id) }}" title="{{$job->name}}">
                                            <div class="card mt-3">
                                                <div class="card-header">
                                                            <h4 class="mt-4 d-inline">{{$job->title}}</h4>
                                                        <!-- <p class="text-right my-auto"> A {{$job->location}} le {{$job->date}}</p> -->
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="evenements" role="tabpanel" aria-labelledby="evenements-tab">
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
                            </div>
                            <div class="tab-pane fade" id="interests" role="tabpanel" aria-labelledby="interests-tab">
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
                        </div>

                    </div>
                    <div class="card-action text-right">
                        @if ($user->id !== Auth::user()->id)
                            @if ($user->isFriend)
                                <a class="btn btn-danger" href="{{ route('contacts_removeFriend', $user->id) }}" title="Retirer de mes contacts">Retirer de mes contacts <i class="fas fa-user-friends"></i></a>
                            @else
                                <a class="btn btn-success" href="{{ route('contacts_addFriend', $user->id) }}" title="Ajouter à mes contacts">Ajouter à mes contacts <i class="fas fa-user-friends"></i></a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            
        </div>

    </div>

@endsection