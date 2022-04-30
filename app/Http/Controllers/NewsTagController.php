<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\News_tag;
use App\Models\Region;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsTagController extends Controller
{
    public function index()
    {
        return redirect()->route('Newstags.store');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag_id' => 'required',
            'news_id' => 'required',
        ]);
        if (!News_tag::where(['tag_id' => $request->tag_id, 'news_id' => $request->news_id])->first()){
            $add = new News_tag();
            $add->news_id = $request->news_id;
            $add->tag_id = $request->tag_id;
            $add->save();
        }else{
            return redirect()->route('news.show',['news' => $request->news_id])->with('error','Bu qoshilgan');
        }

        return redirect()->route('news.show',['news' => $request->news_id]);
    }
}
