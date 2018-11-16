<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('users.show', compact('user'));
    }
}
