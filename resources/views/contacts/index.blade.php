@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-10">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-mycontacts-tab" data-toggle="tab" href="#nav-mycontacts" role="tab" aria-controls="nav-mycontacts" aria-selected="true">Mes contacts</a>
                    <a class="nav-item nav-link" id="nav-incontacts-tab" data-toggle="tab" href="#nav-incontacts" role="tab" aria-controls="nav-incontacts" aria-selected="false">Abonnés</a>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-mycontacts" role="tabpanel" aria-labelledby="nav-mycontacts-tab">

                    <div class="row">
                        <div class="col-md-4">
                            @foreach($contacts as $contact)
                                <a class="nounderline" href="{{ route('contacts_show', $contact->id) }}" title="{{$contact->name}}">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                                    <h4 class="mt-4 d-inline">{{$contact->name}}</h4>
                                                <!-- <p class="text-right my-auto"> A {{$contact->location}} le {{$contact->date}}</p> -->
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        
                        <div class="col-md-8">
                        
                        @if (isset($conversation))
                            <div class="mesgs">
                                <div class="msg_history">

                                @foreach($incoming_messages as $message)
                                    <div class="incoming_msg">
                                        <div class="incoming_msg_img">
                                            <img src="https://ptetutorials.com/images/user-profile.png" alt="user avatar">
                                        </div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p>{{ $message->content }}</p>
                                                <span class="time_date">{{ $conversation->name }} 11:01 AM    |    June 9</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach($outgoing_messages as $message)
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            <p>{{ $message->content }}</p>
                                            <span class="time_date">11:01 AM    |    June 9</span>
                                        </div>
                                    </div>
                                @endforeach

                                </div>
    
                                <div class="type_msg">
                                    <div class="input_msg_write row">
                                        <input type="text" class="write_msg col-md-10" placeholder="Ecrivez un message..." />
                                        <div class="col-md-2">
                                            <button class="d-inline btn btn-primary mt-3" type="button">
                                                Envoyer <i class="fas fa-share-square"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
    
                        </div>
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
    </div>    

</div>

@endsection