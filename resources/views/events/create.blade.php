@extends('layouts.app')

@section('content')

    <div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nouvelle annonce') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('events_create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" value="{{ old('nom') }}" required autofocus>

                                @if ($errors->has('nom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nom') }}</strong>
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter cette annonce') }}
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