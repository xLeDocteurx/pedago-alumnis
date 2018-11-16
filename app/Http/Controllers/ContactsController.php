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
        
        $user_id = $request->user()->id;

        $contacts = Contact::all();
        // $contacts = $request->user()->relate();

        // dd(User::find($user_id)->relate());

        return view('contacts.index', compact('contacts'));
    }
}
