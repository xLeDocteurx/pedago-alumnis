<?php

namespace App\Http\Controllers;

use App\Job;
use App\Tag;
use App\Region;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class JobsController extends Controller
{
    //s
    public function index(Request $request)
    {
        if (isset($_GET['region_id'])) {
            $joblist = Job::where('region_id', $_GET['region_id'])->get();
            $jobs = Job::where('region_id', $_GET['region_id'])->orderBy('id', 'desc')->paginate(5);
        } else {
            $joblist = Job::all();
            $jobs = Job::orderBy('id', 'desc')->paginate(5);
        }
        
        $regions = Region::all();
        $tags = Tag::all();

        return view('jobs.index', compact('jobs','joblist','regions', 'tags'));
    }
}
