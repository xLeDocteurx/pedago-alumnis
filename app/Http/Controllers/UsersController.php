<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use App\Role;
use App\User;
use App\Event;
use App\Job;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    //
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'asc')->paginate(15);
        return view('users.index', compact('users'));
    }

    public function show(Request $request, $name)
    {
        $user = User::where(['name' => $name])->first();
        if($user == null){return redirect()->route('badboy');}
        $events = $user->events()->whereDate('date', '>=', date('Y-m-d'))->get();
        $myEvents = Event::where('author_id', $user->id)->get();
        $myJobs = Job::where('author_id', $user->id)->get();

        $friends_ids = $request->user()->relate->pluck('id')->all();

        if(in_array($user->id, $friends_ids)) {
            $user->isFriend = true;
        } else {
            $user->isFriend = false;
        }

        return view('users.show', compact('user', 'events', 'myEvents', 'myJobs'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $regions = Region::all();
        $roles = Role::all();
        $roles_ids = $user->roles->pluck('id')->all();
        return view('users.update', compact('user', 'regions', 'roles', 'roles_ids'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if(Input::hasFile('image')){
            $image = Input::file('image');
            $image->move('img', $image->getClientOriginalName());
            $image_url = './img/' . $image->getClientOriginalName();
        } else {
            $image_url = $user->image_url;
        }

        $user->update([
            'name' => $request->input('nom').'_'.$request->input('prenom'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'bio' => $request->input('bio'),
            'image_url' => $image_url,
            'email' => $request->input('email'),
            'region_id' => $request->input('region_id'),
        ]);

        
        $user->roles()->sync($request->input('roles'));
        // $events = $user->events()->whereDate('date', '>=', date('Y-m-d'))->get();
        // $myEvents = Event::where('author_id', $user->id)->get();
        return redirect()->route('users_show', $user->name);
    }
}
