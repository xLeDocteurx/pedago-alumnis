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
        // if ($_GET['region_id'] != "tata") {
        //     $annoncesList = Job::where('region_id', $_GET['region_id'])->whereDate('outdated_at', '>=', date('Y-m-d'))->get();
        //     $annonces = Job::where('region_id', $_GET['region_id'])->whereDate('outdated_at', '>=', date('Y-m-d'))->orderBy('id', 'desc')->paginate(5);
        // }
        //  if(isset($_GET['tag_id'])) {
            
        //     // $books = App\Book::with(['author', 'publisher'])->get();
        //     $tagList = Job::with('tags')->where('tag_id', $_GET['tag_id'])->get();
        // $annonces = Job::where('tag_id', $_GET['tag_id'])->whereDate('outdated_at', '>=', date('Y-m-d'))->orderBy('id', 'desc')->paginate(5);
        // } else {
            // }
            //dd($randomTag->jobs);
            // ->where('tag_id', $_GET['tag_id'])->get();
            // dd($tagfilter);
        $annonces = Job::whereDate('outdated_at', '>=', date('Y-m-d'))->orderBy('id', 'desc')->paginate(5);
        $regions = Region::all();
        $tags = Tag::all();

        return view('jobs.index', compact('annonces','regions', 'tags'));
    }

    public function filter(Request $request)
    {
        $id_tag = $request->input('tag_id');
        $id_region = $request->input('region_id');
        $annonces = Job::orderBy('id', 'desc')->paginate(5);

        if ($id_tag !== 'prout' && $id_region !== 'prout') {
            $annonces = Tag::findOrfail($id_tag)
                        ->jobs()
                        ->where('region_id', $id_region)
                        ->whereDate('outdated_at', '>=', date('Y-m-d'))
                        ->orderBy('id', 'desc')
                        ->paginate(5);
        } elseif ($id_tag !== 'prout') {
            $annonces = Tag::findOrfail($id_tag)
                        ->jobs()
                        ->whereDate('outdated_at', '>=', date('Y-m-d'))
                        ->orderBy('id', 'desc')
                        ->paginate(5);
        } elseif ($id_region !== 'prout') {
            $annonces = Region::findOrfail($id_region)
                        ->jobs()
                        ->whereDate('outdated_at', '>=', date('Y-m-d'))
                        ->orderBy('id', 'desc')
                        ->paginate(5);
        }

        $regions = Region::all();
        $tags = Tag::all();
        return view('jobs.index', compact('id_tag','id_region','selectedTag','selectedRegion','annonces','regions','tags'));
    }

    public function show(Request $request, $id)
    {
        $annonce = Job::findOrFail($id);
        $jobtags = $annonce->tags;
        $suggestions = [];

        foreach($jobtags as $jobtag){
            foreach($jobtag->users as $user){
                array_push($suggestions, $user);
            }
        }

        $sizeof = sizeof($suggestions);
        if($sizeof > 5) {$sizeof = 5;}
        if($sizeof != 0){
            $suggestions_ids = array_rand($suggestions, sizeof($suggestions));
        } else {$suggestions_ids = []; }

        $suggestions_bis = [];
        foreach($suggestions_ids as $suggestion_id){
            array_push($suggestions_bis, $suggestions[$suggestion_id]);
        }
        $suggestions = $suggestions_bis;

        return view('jobs.show', compact('annonce', 'jobtag', 'suggestions'));
    }

    public function create(Request $request)
    {
        $jobs =  Job::all();
        $regions = Region::all();
        $today = date('Y-m-d');
        $nextYear = date('Y-m-d',strtotime('+1 year'));
        $alltags = Tag::all();

        return view('jobs.create', compact('jobs','regions','today','nextYear','alltags'));
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
            'outdated_at' => $request->input('outdated_at'),
            'refreshed_at' => $request->input('outdated_at'),
            'author_id' => $request->user()->id,
        ])->tags()->attach($request->input('tags'));

        return redirect()->route('annonces');
    }

    public function delete(Request $request, $id)
    {
        $annonce = Job::findOrfail($id)->delete();

        return redirect()->route('annonces');
    }

    public function update(Request $request, $id)
    {
        $annonce = Job::findOrfail($id);
        $today = date('Y-m-d');
        $nextYear = date('Y-m-d',strtotime('+1 year'));
        $regions = Region::all();
        // $alltagsuser = $annonce->tags->all();
        $alltags = Tag::all();
        $alltagsid = $annonce->tags->pluck('id')->all();
        // dd($annonce->region());
        return view('jobs.update', compact('regions','annonce','today','nextYear','alltags','jobtagsuser','alltagsid'));
    }

    public function storeUpdate(Request $request, $id)
    {
        // dd($request->input('outdated_at'));
        $annonce = Job::findOrfail($id);
        
        $annonce->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'company' => $request->input('company'),
            'region_id' => $request->input('region_id'),
            'location' => $request->input('location'),
            'outdated_at' => $request->input('outdated_at'),
            'refreshed_at' => $request->input('outdated_at'),
            'author_id' => $request->user()->id,
        ]);
        $annonce->tags()->sync($request->input('tags'));
        return redirect()->route('annonces');
    }
}
