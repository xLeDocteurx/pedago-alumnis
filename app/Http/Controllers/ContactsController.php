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
        
        $contacts = Contact::where('relating_id', 2)->get();
        // $contacts = User::find($user_id)->relate()->get();
        // $contacts = $request->user()->relate()->get();

        // dd($user_id);

        return view('contacts.index', compact('contacts'));
    }
}
