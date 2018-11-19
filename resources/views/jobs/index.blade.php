@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">
        <form action="{{ route('annonces') }}" method="get" class="mb-4">
        @csrf
            <label for="region-filter">Région</label>
            <select onchange="this.form.submit()" name="region_id" id="region-select" name="region-filter">
                <option >Selectionnez une région</option>
                @foreach($regions as $region)
                    <option value="{{$region->id}}">{{$region->name}}</option>
                @endforeach
            </select>

            <label for="tag-filter">Tag</label>
            <select onchange="this.form.submit()" name="tag_id" id="tag-select" name="tag-filter">
                <option >Selectionnez un tag</option>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->tagFamily->id}} / {{$tag->name}}</option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="row">
        <div class="mx-auto">{{ $jobs->links() }}</div>
        <div class="mx-auto">
            <a class="btn btn-primary" href="{{ route('annonces_create') }}" title="{{ __('Ajouter une annonce') }}">Ajouter une annonce <i class="fas fa-plus-circle"></i></a>    
        </div>
    </div>

    <div class="row justify-content-center">
        @if (sizeof($jobs) > 0)
            @foreach($jobs as $job)
                <div class="col-10">
                    <div class="card my-3">
                        <a class="nounderline" href="{{ route('annonces_show', $job->id) }}" title="{{$job->title}}">
                            <div class="card-header">
                                <h3 class="mt-4 d-inline">{{$job->title}}</h3>
                                <p class="text-right my-auto">
                                    <span class="badge p-2 badge-primary">{{ $job->region->name }}</span> A {{$job->location}} le {{$job->date}}
                                </p>
                            </div>
                        </a>    
                        <div class="card-body">
                        <p class="my-4">{{$job->content}}</p> 
                        
                        <p class="text-right">Créé par <a href="{{ route('users_show', $job->author->id) }}" title="{{$job->author->name}} profile">{{$job->author->name}}</a></p>
                        
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-10">
                <div class="card my-3">
                    <div class="card-header">
                        <h3 class="mt-4 d-inline">Il n'y a aucune annonce correspondant à vos critères</h3>
                    </div>
                    <div class="card-body">
                        #Sad #Marqui 
                    </div>
                </div>
            </div>
        @endif
    </div>


    <div class="row">
        <div class="mx-auto">{{ $jobs->links() }}</div>
        <div class="mx-auto">
            <a class="btn btn-primary" href="{{ route('annonces_create') }}" title="{{ __('Ajouter un évènement') }}">Ajouter un évènement <i class="fas fa-plus-circle"></i></a>    
        </div>
    </div>

@endsection