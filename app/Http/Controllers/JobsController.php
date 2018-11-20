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
            $annoncesList = Job::where('region_id', $_GET['region_id'])->whereDate('outdated_at', '>=', date('Y-m-d'))->get();
            $annonces = Job::where('region_id', $_GET['region_id'])->whereDate('outdated_at', '>=', date('Y-m-d'))->orderBy('id', 'desc')->paginate(5);
        } else {
            $annoncesList = Job::whereDate('outdated_at', '>=', date('Y-m-d'))->get();
            $annonces = Job::whereDate('outdated_at', '>=', date('Y-m-d'))->orderBy('id', 'desc')->paginate(5);
        }
        
        $regions = Region::all();
        $tags = Tag::all();

        return view('jobs.index', compact('annonces','annoncesList','regions', 'tags'));
    }

    public function show($id)
    {
        $annonce = Job::findOrFail($id);

        return view('jobs.show', compact('annonce'));
    }

    public function create(Request $request)
    {
        $jobs =  Job::all();
        $regions = Region::all();
        $today = date('Y-m-d');
        $nextYear = date('Y-m-d',strtotime('+1 year'));

        return view('jobs.create', compact('jobs','regions','today','nextYear'));
    }

    public function storejob(Request $request)
    {
        Job::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'company' => $request->input('company'),
            // 'image_url' => $image_url,
            'region_id' => $request->input('region_id'),
            'location' => $request->input('location'),
            'outdated_at' => $request->input('date'),
            'refreshed_at' => $request->input('date'),
            'author_id' => $request->user()->id,

        ]);
        return redirect()->route('annonces');
    }

    public function delete(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {

    }
}
