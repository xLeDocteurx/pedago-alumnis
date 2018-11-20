<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    //
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'asc')->paginate(5);
        return view('users.index', compact('users'));
    }

    public function show(Request $request, $name)
    {
        $user = User::where(['name' => $name])->first();
        if($user == null){return redirect()->route('badboy');}
        $events = $user->events()->whereDate('date', '>=', date('Y-m-d'))->get();
        $myEvents = Event::where('author_id', $user->id)->get();

        $friends_ids = $request->user()->relate->pluck('id')->all();

        if(in_array($user->id, $friends_ids)) {
            $user->isFriend = true;
        } else {
            $user->isFriend = false;
        }

        return view('users.show', compact('user', 'events', 'myEvents'));
    }

    public function update(Request $request)
    {

        $user = Auth::user();
        return view('users.update', compact('user'));
    }

    public function store(Request $request)
    {

    }
}
