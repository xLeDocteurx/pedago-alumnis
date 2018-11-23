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
                 
        //                 // $annonces = Job::where('tag_id', $_GET['tag_id'])->whereDate('outdated_at', '>=', date('Y-m-d'))->orderBy('id', 'desc')->paginate(5);
        // } else {
            // }
            //dd($randomTag->jobs);
            // ->where('tag_id', $_GET['tag_id'])->get();
            // dd($tagfilter);
        $annoncesList = Job::whereDate('outdated_at', '>=', date('Y-m-d'))->get();
        $annonces = Job::whereDate('outdated_at', '>=', date('Y-m-d'))->orderBy('id', 'desc')->paginate(5);
        $alljobs = Job::all();
        $tagfilter = $alljobs->load('tags');

        $randomTag = Tag::findOrfail(2);
    
        $regions = Region::all();
        $tags = Tag::all();

        return view('jobs.index', compact('annonces','annoncesList','regions', 'tags', 'tagList','alljobs','tagfilter','randomTag'));
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

    public function filter(Request $request)
    {
        $id_tag = $request->input('tag_id');
        $id_region = $request->input('region_id');
        $job = Job::all();
        // dd($id_tag);

        
        $annoncesList = Job::whereDate('outdated_at', '>=', date('Y-m-d'))->get();
        
        
        if($id_region !== "Selectionnez une région" && $id_region !==null){
            if($id_tag == "Selectionnez un tag"){
                $annonces = Job::where('region_id',$id_region)->paginate(5);        
            }else{
            
                $annonces = Job::all();
                dd($annonces);
                    }
            
        } elseif ($id_tag !== "Selectionnez un tag" ) {
            $annonces = Job::find($id_tag)->where('tag_id',$id_tag)->paginate(5);
        } else {
            dd('3');
        }
        $annonces = Job::find($id_region)->where('region_id',$id_region)->paginate(5);
        $alljobs = Job::all();
        $tagfilter = $alljobs->load('tags');
        
        $randomTag = Tag::findOrfail($id_region);
            // dd($randomTag);
            $regions = Region::all();
        $tags = Tag::all();

        return view('jobs.index', compact('job','id_tag','id_region','annoncesList','annonces','alljobs','tagfilter','randomTag','regions','tags'));
    }
}
