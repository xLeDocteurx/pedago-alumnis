@extends('layouts.app')

@section('content')

<div class="container-fluid">
        
<div class="col-md-4">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-mycontacts-tab" data-toggle="tab" href="#nav-mycontacts" role="tab" aria-controls="nav-mycontacts" aria-selected="true">Mes contacts</a>
            <a class="nav-item nav-link" id="nav-incontacts-tab" data-toggle="tab" href="#nav-incontacts" role="tab" aria-controls="nav-incontacts" aria-selected="false">Abonnés</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-mycontacts" role="tabpanel" aria-labelledby="nav-mycontacts-tab">
            <div class="row justify-content-center">
                @foreach($contacts as $contact)
                
                <div class="col-12">
                        <a class="nounderline" href="{{ route('users_show', $contact->id) }}" title="{{$contact->name}}">
                            <div class="card mt-3">
                                <div class="card-header">
                                            <h4 class="mt-4 d-inline">{{$contact->name}}</h4>
                                        <!-- <p class="text-right my-auto"> A {{$contact->location}} le {{$contact->date}}</p> -->
                                </div>
                            </div>
                        </a>
                    </div>
                
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="nav-incontacts" role="tabpanel" aria-labelledby="nav-incontacts-tab">
            <div class="row justify-content-center">
                @foreach($in_contacts as $contact)
                
                    <div class="col-12">
                        <a class="nounderline" href="{{ route('users_show', $contact->id) }}" title="{{$contact->name}}">
                            <div class="card mt-3">
                                <div class="card-header">
                                            <h4 class="mt-4 d-inline">{{$contact->name}}</h4>
                                        <!-- <p class="text-right my-auto"> A {{$contact->location}} le {{$contact->date}}</p> -->
                                </div>
                            </div>
                        </a>
                    </div>
                
                @endforeach
            </div>
        </div>
    </div>
</div>    
<div class="col-md-8">
</div>

</div>

@endsection