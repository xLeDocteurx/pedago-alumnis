@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            
            <div class="col-10">
                <div class="card my-4">
                    <div class="card-header">
                    
                            @if ($annonce->author->id === Auth::user()->id)
                                <a class="btn btn-danger" href="{{ route('annonces_delete', $annonce->id) }}" title="{{ __('Supprimer l\'évènement') }}">Supprimer l'évènement <i class="fas fa-trash"></i></a>
                                <a class="btn btn-warning" href="{{ route('annonces_update', $annonce->id) }}" title="{{ __('Modifier')}}">Modifier<i class="fas fa-edit"></i></a>
                                
                            @endif
                            <h3 class="mt-3"> {{$annonce->title}}</h3>
                        
                            <p class="text-right my-auto"> 
                            <span class="badge p-2 badge-primary"> {{$annonce->region->name}}</span> A {{$annonce->location}} le {{$annonce->date}}</p>

                    </div>
                    <div class="card-body">
                        <p class="my-4">
                            {{$annonce->content}}
                        </p> 
                        <p class="text-right">
                            Créé par 
                            <a href="{{ route('users_show', $annonce->author->id) }}" title="{{$annonce->author->name}} profile">
                                {{$annonce->author->name}}
                            </a>
                        </p>
                        <p class="my-4">
                            <h4>Personnes intéressées :</h4>

                            @foreach($annonce->subscribers as $subscriber)
                                <a class="nounderline" href="{{ route('users_show', $subscriber->id) }}" title="{{$subscriber->name}}">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                                    <h4 class="mt-4 d-inline">{{$subscriber->name}}</h4>
                                                <!-- <p class="text-right my-auto"> A {{$subscriber->location}} le {{$subscriber->date}}</p> -->
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </p> 
                    </div>
                    <div class="card-action text-right">
                            @if ($annonce->author->id !== Auth::user()->id)
                                @if ($annonce->participating)
                                    <a class="btn btn-outline-primary" href="{{ route('annonces_unsubscribe', $annonce->id) }}" title="{{ __('Je ne suis plus intéressé') }}">Je ne suis plus intéressé <i class="fa fa-star"></i></a>
                                @else
                                    <a class="btn btn-primary" href="{{ route('annonces_subscribe', $annonce->id) }}" title="{{ __('Je suis intéressé') }}">Je suis intéressé <i class="far fa-star"></i></a>
                                @endif
                            @endif
                    </div>
                </div>
            </div>
            
        </div>    
    
    </div>

@endsection