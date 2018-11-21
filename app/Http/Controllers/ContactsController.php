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
        
        $incoming_messages = Message::where('sender_id', $id)->where('receiver_id', $request->user()->id)->orderBy('id', 'asc')->paginate(10);
        $outgoing_messages = Message::where('receiver_id', $id)->where('sender_id', $request->user()->id)->orderBy('id', 'asc')->paginate(10);
        
        $messages = [];
        foreach($incoming_messages as $message){
            array_push($messages, $message);
        }
        foreach($outgoing_messages as $message){
            array_push($messages, $message);
        }
        usort($messages, function ($e1, $e2) {
            return $e1->id - $e2->id;
        });

        return view('contacts.index', compact('contacts', 'in_contacts', 'conversation', 'messages'));
    }

    public function send_message(Request $request, $id) 
    {
        Message::create([
            'sender_id' => $request->user()->id,
            'receiver_id' => $id,
            'content' => $request->input('message'),
        ]);
        return redirect()->route('contacts_show', $id);
    }

    public function remove_message(Request $request, $id, $message_id)
    {
        Message::findOrfail($message_id)->delete();
        return redirect()->route('contacts_show', $id);
    }

    public function addFriend(Request $request, $id)
    {
        $contact = User::findOrfail($id);
        $request->user()->relate()->attach($contact);
        return redirect()->back();
    }

    public function removeFriend(Request $request, $id) {
        
        $contact = User::findOrfail($id);
        $request->user()->relate()->detach($contact);
        return redirect()->back();
    }
}
