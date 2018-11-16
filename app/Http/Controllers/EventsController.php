<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::orderBy('id', 'desc')->paginate(5);
        
        return view('events.index', compact('events'));
    }

    public function create(Request $request)
    {
        $today = date('Y-m-d');
        $nextYear = date('Y-m-d',strtotime('+1 year'));
        return view('events.create', compact('today','nextYear'));
    }

    public function store(Request $request)
    {
        Event::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'location' => $request->input('location'),
            'date' => $request->input('date'),
            'author_id' => $request->user()->id,

        ]);
        // Rediriger vers  la  view "show" dès qu'elle sera disponible
        return redirect()->route('events');
    }
}
