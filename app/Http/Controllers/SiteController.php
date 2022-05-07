<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\News;
use App\Models\Tanlov;
use Request;

class SiteController extends Controller
{
    public function index()
    {
        $latestNews=News::all()->random(3)->all();
        $reklama = Advertise::all()->random(1)->first();
        $video3News = News::where(['type' => News::TYPE_CHECKED])->orderBy('created_at','DESC')->limit(6)->get();
        $tanlov=Tanlov::orderBy('created_at','DESC')->limit(4)->get();
        return view('home', compact('reklama','video3News','tanlov','latestNews'));
    }

    public function views(News $news)
    {
        return view('partials.view', ['new' => $news]);
    }
    public function latestNew(News $latestNew){

        return view('partials.view',['latestNew'=>$latestNew]);
    }


}
