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

    public function show(Request $request, $id)
    {
        $user = User::find($id);
        $events = $user->events()->whereDate('date', '>=', date('Y-m-d'))->get();
        $myEvents = Event::where('author_id', $id)->get();

        $friends_ids = $request->user()->relate->pluck('id')->all();

        if(in_array($id, $friends_ids)) {
            $user->isFriend = true;
        } else {
            $user->isFriend = false;
        }

        return view('users.show', compact('user', 'events', 'myEvents'));
    }
}
