@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-2 bg-dark text-light">
            @foreach ($contacts as $contact)
                <div class="my-2 bg-light text-dark">
                    {{ $contact->relating }}
                </div>
            @endforeach
        </div>
        
        <div class="col-md-8">

        </div>

        <div class="col-md-2"></div>

    </div>
</div>

@endsection