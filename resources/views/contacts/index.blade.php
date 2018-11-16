@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-2">
            @foreach ($contacts as $contact)
                <div class="my-2">
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