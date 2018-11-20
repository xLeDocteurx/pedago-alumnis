<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use App\Region;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{

    public function index(Request $request)
    {
        if (isset($_GET['region_id'])) {
            $eventlist = Event::where('region_id', $_GET['region_id'])->whereDate('date', '>=', date('Y-m-d'))->get();
            $events = Event::where('region_id', $_GET['region_id'])->whereDate('date', '>=', date('Y-m-d'))->orderBy('id', 'desc')->paginate(5);
        } else {
            $eventlist = Event::whereDate('date', '>=', date('Y-m-d'))->get();
            $events = Event::whereDate('date', '>=', date('Y-m-d'))->orderBy('id', 'desc')->paginate(5);
        }
        
        $regions = Region::all();

        return view('events.index', compact('events','eventlist','regions'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $subscribers_ids = $event->subscribers->pluck('id')->all();
        $regions = Region::all();

        if(in_array(Auth::user()->id, $subscribers_ids)) {
            $event->participating = true;
        } else {
            $event->participating = false;
        }

        return view('events.show', compact('event','regions'));
    }

    public function subscribe(Request $request, $id)
    {
        $event = Event::find($id);
        try {
            $event->subscribers()->attach($request->user()->id);
        }
        catch (Exception $e) {}
        finally {
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

        $regions = Region::all();

        return view('events.create', compact('today','nextYear','regions'));
    }

    public function store(Request $request)
    {

        Event::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            // 'image_url' => $image_url,
            'region_id' => $request->input('region_id'),
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

    public function update(Request $request, $id)
    {
        $event = Event::findOrfail($id);
        $today = date('Y-m-d');
        $nextYear = date('Y-m-d',strtotime('+1 year'));

        $regions = Region::all();

        return view('events.update' ,compact('event','today','nextYear','regions'));
    }
    public function storeUpdate(Request $request, $id)
    {
        $event = Event::findOrfail($id);
        $event->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'location' => $request->input('location'),
            'date' => $request->input('date'),
            'author_id' => $request->user()->id,
        ]);

        return redirect()->route('events_show',$id);
    }
}
