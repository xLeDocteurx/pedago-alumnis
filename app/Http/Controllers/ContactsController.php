<?php

namespace App\Http\Controllers;

use App\Message;

use App\User;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContactsController extends Controller
{
    //
    public function index (Request $request) {
        
        $current_user = $request->user();
        $relating_id = $current_user->id;
        
        $contacts = $current_user->relate()->get();
        $in_contacts = $current_user->isRelated()->get();

        return view('contacts.index', compact('contacts', 'in_contacts'));
    }

    public function show (Request $request, $id) {
        
        $current_user = $request->user();
        
        $contacts = $current_user->relate()->get();
        $in_contacts = $current_user->isRelated()->get();

        $conversation = User::find($id);
        
        $incoming_messages = Message::where('sender_id', $id)->where('receiver_id', $request->user()->id)->get();
        // dd($incoming_messages);
        $outgoing_messages = Message::where('receiver_id', $id)->where('sender_id', $request->user()->id)->get();

        return view('contacts.index', compact('contacts', 'in_contacts', 'conversation', 'incoming_messages', 'outgoing_messages'));
    }
}
