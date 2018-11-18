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
        
        $contacts = $current_user->isRelated()->get();
        $in_contacts = $current_user->relate()->get();

        return view('contacts.index', compact('contacts', 'in_contacts'));
    }

    public function show (Request $request, $id) {
        
        $current_user = $request->user();
        $relating_id = $current_user->id;
        
        $contacts = $current_user->isRelated()->get();
        $in_contacts = $current_user->relate()->get();

        // dd($relating_id);

        $conversation = User::find($id);
        
        $incoming_messages = '';

        $outgoing_messages = '';

        return view('contacts.index', compact('contacts', 'in_contacts', 'conversation'));
    }
}
