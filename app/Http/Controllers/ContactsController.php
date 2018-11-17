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
        
        // $contacts = Contact::where('relating_id', 2)->get();
        $contacts = $current_user->isRelated()->get();
        $in_contacts = $current_user->relate()->get();

        // dd($relating_id);

        return view('contacts.index', compact('contacts', 'in_contacts'));
    }
}
