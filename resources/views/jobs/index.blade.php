@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <form action="{{ route('annonces_filter') }}" method="post" class="mb-4">
        @csrf
            <label for="region_id">Région</label>
            <select name="region_id" id="region_id">
                <option value="prout">Selectionnez une région</option>
                @foreach($regions as $region)
                    <option value="{{$region->id}}"
                    @if(isset($id_region))
                        @if($id_region == $region->id)
                            selected
                        @endif
                    @endif
                    >{{$region->name}}</option>
                @endforeach
            </select>
            
            <label for="tag_id">Tag</label>
            <select name="tag_id" id="tag_id">
                <option value="prout">Selectionnez un tag</option>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                    @if(isset($id_tag))
                        @if($id_tag == $tag->id)
                            selected
                        @endif
                    @endif
                    >{{$tag->tagFamily->id}} / {{$tag->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success m-3">Ok</button>
        </form>

    </div>

    <div class="row">
        <div class="mx-auto">{{ $annonces->links() }}</div>
        <div class="mx-auto">
            <a class="btn btn-primary" href="{{ route('annonces_create') }}" title="{{ __('Ajouter une annonce') }}">Ajouter une annonce <i class="fas fa-plus-circle"></i></a>    
        </div>
    </div>

    <div class="row justify-content-center">
        @if(sizeof($annonces) > 0)
            @foreach($annonces as $annonce)
            <div class="col-10">
                <div class="card my-3">
                        <a class="nounderline" href="{{ route('annonces_show', $annonce->id) }}" title="{{$annonce->title}}">
                    <div class="card-header">
                            <img class="mx-auto rounded-circle" src="{{ ($annonce->image_url) }}" alt="Logo de l'entreprise" style="max-width: 100px;">
                            <h3 class="mt-4 d-inline">{{$annonce->title}}</h3>
                        <p class="text-right my-auto">
                            <span class="badge p-2 badge-secondary"> {{ $annonce->region->name }}</span> A {{$annonce->location}} le {{$annonce->outdated_at}}
                        </p>
                    </div>
                        </a>
                    <div class="card-body">
                    <p class="my-4">
                        {!! nl2br(e($annonce->content)) !!}
                    </p> 
                    
                    @foreach($annonce->tags as $tag)
                        <span class="text-left badge p-2 badge-success">{{$tag->name}}</span>
                        @endforeach    
                    <p class="text-right">
                    
                    Créé par <a href="{{ route('users_show', $annonce->author->id) }}" title="{{$annonce->author->name}} profile">{{$annonce->author->name}}</a></p>
                    
                    </div>
                </div>
            </div>
            
            @endforeach
        @else
            <p class="text-center">Aucun évènement ne correspond à votre recherche</p>
        @endif
    </div>


    <div class="row">
        <div class="mx-auto">{{ $annonces->links() }}</div>
        <div class="mx-auto">
            <a class="btn btn-primary" href="{{ route('annonces_create') }}" title="{{ __('Ajouter une annonce') }}">Ajouter une annonce <i class="fas fa-plus-circle"></i></a>    
        </div>
    </div>

@endsection