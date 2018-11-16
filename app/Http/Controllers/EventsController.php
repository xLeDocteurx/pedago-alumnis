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
        
        return view('events.create');
    }

    public function store(Request $request)
    {
        
        return redirect()->route('events');
    }
}
