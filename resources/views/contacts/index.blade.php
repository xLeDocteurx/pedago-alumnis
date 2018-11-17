@extends('layouts.app')

@section('content')

<div class="container-fluid">
        
    <div class="row justify-content-center">
        @foreach($contacts as $contact)
        
            <div class="col-md-8">
                    <div class="card my-3">
                        <div class="card-header">
                            <h4 class="mt-4 d-inline">{{$contact}}</h4>
                        </div>
                    </div>
            </div>
        
        @endforeach
    </div>

</div>

@endsection