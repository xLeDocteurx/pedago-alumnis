@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edition du profil de {{ $user->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users_store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" name="image" type="file" class="form-control" value="{{ old('image') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" value="{{ $user->nom }}" required autofocus>

                                @if ($errors->has('nom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" value="{{ $user->prenom }}" required autofocus>

                                @if ($errors->has('prenom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row  px-4">
                            <label for="roles" class="col-md-4 col-form-label text-md-right">{{ __('Rôle(s)') }}</label>
                            @foreach($roles as $role)
                                    @if($role->id > 2)
                                        <div class="checkbox">
                                            <label><input name="roles[]" type="checkbox" value={{ $role->id }}
                                            @if(in_array($role->id, $roles_ids))
                                                checked
                                            @endif
                                            >{{ $role->name }}</label>
                                        </div>
                                    @endif
                            @endforeach
                        </div>

                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>

                            <div class="col-md-6">
                                <select id="region_id" name="region_id" class="form-control{{ $errors->has('region_id') ? ' is-invalid' : '' }}" required autofocus>
                                    @if($user->region_id == null)
                                        <option selected>Sélectionnez une région</option>
                                    @endif                                    
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}" 
                                            @if($region->id == $user->region_id)
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
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                <textarea id="bio" class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}" name="bio">{{ $user->bio }}
                                </textarea>

                                @if ($errors->has('bio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <p class="text-center">
                            <a class="" href="#" title="Changer de  mot de passe">Envie de changer de mot de passe ?</a>
                        </p>
                        <p class="text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Modifier') }}
                            </button>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
