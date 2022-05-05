<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\News;

class SiteController extends Controller
{
    public function index()
    {
        $last3News = News::offset(0)->limit(4)->get();
        return view('home',compact('last3News'));

    }

}
