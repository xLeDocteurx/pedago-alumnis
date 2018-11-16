@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="row justify-content-center">
            
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-header">
                            <h3 class="mt-4"> {{$user->name}}</h3>
                            <!-- <p class="text-right my-auto"> A {{$user->location}} le {{$user->date}}</p> -->
                    </div>
                    <div class="card-body">
                        <!-- <p class="my-4">{{$user->content}}</p>  -->
                    </div>
                    <div class="card-action text-right">
                        <!--  Ajouter à sa liste de contacts -->
                        <a class="btn btn-outline-primary" href="#" title="Ajouter à mes contacts">Ajouter à mes contacts <i class="fas fa-user-friends"></i></a>
                    </div>
                </div>
            </div>
            
        </div>    
    
    </div>

@endsection