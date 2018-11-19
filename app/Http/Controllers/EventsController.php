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
        $eventlist = Event::all();
        
        return view('events.index', compact('events','eventlist'));
    }
    public function show($id)
    {
        $event = Event::findOrFail($id);
        // $eventuser = Event::find($id)->subscribers()->get();
        return view('events.show', compact('event', 'eventuser'));
    }

    public function subscribe(Request $request, $id)
    {
        try {
            $event = Event::find($id);
            $event->subscribers()->attach($request->user()->id);
    
            return redirect()->route('events_show', $id);
        }
        catch (Exception $e) {
            
            return redirect()->route('events_show', $id);
        }

    }

    public function unsubscribe(Request $request, $id)
    {
        $event = Event::find($id);
        $request->user()->events()->detach($event->id);

        return redirect()->route('events_show', $id);
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

    public function delete(Request $request, $id){
        Event::findOrfail($id)->delete();

        return redirect()->route('events');
    }

    public function filter(Request $request){

    }
}
