@extends('layouts.app')

@section('content')

    <div class="container">
        
        <div class="row justify-content-center">

            <div class="col-10">
                <div class="card my-4">
                    <img class="card-img-top" src="{{ asset($annonce->image_url) }}" alt="User avatar" style="max-width: 150px;">
                    <div class="card-header">
                            @if ($annonce->author->id === Auth::user()->id)
                                <a class="btn btn-danger" href="{{ route('annonces_delete', $annonce->id) }}" title="{{ __('Supprimer l\'évènement') }}">Supprimer l'évènement <i class="fas fa-trash"></i></a>
                                <a class="btn btn-warning" href="{{ route('annonces_update', $annonce->id) }}" title="{{ __('Modifier')}}">Modifier<i class="fas fa-edit"></i></a>

                            @endif
                            <h3 class="mt-3"> {{$annonce->title}}</h3>
                        
                            <p class="text-right my-auto">
                            <span class="badge p-2 badge-secondary"> {{$annonce->region->name}}</span> A {{$annonce->location}} le {{$annonce->date}}</p>
                    </div>
                    <div class="card-body">
                        <p class="my-4">{!! nl2br(e($annonce->content)) !!}</p> 
                        @foreach($annonce->tags as $tag)
                            <span class="badge p-2 badge-primary"> {{$tag->name}}</span>
                        @endforeach
                        
                        <p class="text-right">Créé par 
                            <a href="{{ route('users_show', $annonce->author->id) }}" title="{$annonce->author->name}} profile">{{$annonce->author->name}}</a>
                        </p>
        
                    </div>
                </div>
            </div>
            
        </div>    
    
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card my-4">
                    <div class="card-header">
                        <h4>Ces profils pourraient vous interesser</h4>
                    </div>
                    <div class="card-body">

                        @for($i = 0; $i < 5 && $i < sizeof($suggestions); $i++)
                            <a class="nounderline" href="{{ route('users_show', $suggestions[$i]->name) }}" title="Profil de {{ $suggestions[$i]->nom }} {{ $suggestions[$i]->prenom }}">
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h4 class="mt-4 d-inline">{{ $suggestions[$i]->nom }} {{ $suggestions[$i]->prenom }}</h4>
                                        @if($suggestions[$i]->region)
                                            <span class="text-left badge p-2 badge-secondary">{{$suggestions[$i]->region->name}}</span>
                                        @endif
                                        @foreach($suggestions[$i]->roles as $role)
                                            <span class="text-left badge p-2 badge-primary">{{$role->name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                        @endfor

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection