@extends('layouts.app')

@section('content')

    <div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="my-auto text-center">{{ __('Modifier votre annonce emploi') }}</h3> </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('annonces_storeupdate',$annonce->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $annonce->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Contenu') }}</label>

                            <div class="col-md-6">
                                <textarea id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" value="{{ old('content') }}" required autofocus>{{ $annonce->content }}</textarea>

                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Entreprise') }}</label>

                            <div class="col-md-6">
                                <textarea id="company" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{ old('company') }}" required autofocus>{{ $annonce->company }}</textarea>

                                @if ($errors->has('company'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>

                            <div class="col-md-6">
                                
                                <select id="region_id" name="region_id" class="form-control{{ $errors->has('region_id') ? ' is-invalid' : '' }}" required autofocus>
                                    
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}"
                                            @if($region->id == $annonce->region_id)
                                            selected
                                            @endif>{{ $region->name }}</option>
                                            
                                    @endforeach
                                    
                                </select>
                                @if ($errors->has('region_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('region_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ $annonce->location }}" required autofocus>

                                @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="outdated_at" class="col-md-4 col-form-label text-md-right">{{ __('date de l\'annonce') }}</label>

                            <div class="col-md-6">
                                <input id="outdated_at" type="date" min="{{$today}}" max="{{$nextYear}}" class="form-control{{ $errors->has('outdated_at') ? ' is-invalid' : '' }}" name="outdated_at" value="{{ $annonce->outdated_at }}" required autofocus>

                                @if ($errors->has('outdated_at'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('outdated_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group row  px-4">
                            <label for="roles" class="col-md-4 col-form-label text-md-right">{{ __('Rôle(s)') }}</label>
                            <select class="col-md-6 form-control{{ $errors->has('roles') ? ' is-invalid' : '' }}" id="roles" name="roles">
                                <option value="3">Formateur</option>
                                <option value="4">Professionnel</option>
                                <option value="5" selected>Alumni</option>
                                <option value="6">Apprenant</option>
                            </select>
                        </div> -->

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">{{ __('Tags')}}</label>
                            <div class="input-group">
                                @foreach($alltags as $tag)
                                    <input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                    @if(in_array($tag->id, $alltagsid))
                                        checked
                                    @endif
                                    >{{$tag->name}}<br>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modifier votre annonce') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    </div>

@endsection