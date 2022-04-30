<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\News_tag;
use App\Models\Region;
use App\Models\Tag;
use App\Models\Tanlov;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{


    public function index(Request $request)
    {

        $query=News::orderBy('created_at','Desc');
        if (!empty($value = $request->get('title_uz'))) {
            $query->where('title_uz', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('desc_ru'))) {
            $query->where('desc_ru', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('category'))) {
            $query->where('category', $value);
        }
        $news = $query->paginate(4);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        $regions = Region::all();
        return view('admin.news.create', compact('categories', 'regions'));

    }

    public function store(NewsRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileNameWidthExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWidthExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . time() . "." . $ext;
            $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }
        $request['image'] = $fileNameToStore;

        $news1 = new News();
        $type = News::TYPE_NOT_CHECKED;
        if (isset($request['type'])) {
            $type = $request['type'];
        }
        $news1->title_uz = $request['title_uz'];
        $news1->title_ru = $request['title_ru'];
        $news1->title_oz = $request['title_oz'];
        $news1->body_uz = $request['body_uz'];
        $news1->body_ru = $request['body_ru'];
        $news1->body_oz = $request['body_oz'];
        $news1->desc_oz = $request['desc_oz'];
        $news1->desc_uz = $request['desc_uz'];
        $news1->desc_ru = $request['desc_ru'];
        $news1->category = $request['category'];
        $news1->region = $request['region'];
        $news1->image = $fileNameToStore;
        $news1->url = $request['url'];
        $news1->type = $type;
        $news1->views_count = 0;
        $news1->save();
        return redirect()->route('news.index');
    }

    public function show(News $news)
    {
        $tags = Tag::all();
        $newsTags = News_tag::where(['news_id' => $news->id])->get();
        return view('admin.news.show', ['news' => $news, 'tags' => $tags, 'newsTags' => $newsTags]);
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        $regions = Region::all();
        return view('admin.news.edit', ['news' => $news, 'categories' => $categories, 'regions' => $regions]);
    }

    public function update(NewsRequest $request, News $news)
    {
        if ($request->hasFile('image')) {
            $fileNameWidthExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWidthExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . time() . "." . $ext;
            $request->file('image')->storeAs('public/images', $fileNameToStore);
            $request['image'] = $fileNameToStore;
        } else {
            $request['image'] = $news->image;
        }
        $type = $request['type'];
        $news->title_uz = $request['title_uz'];
        $news->title_ru = $request['title_ru'];
        $news->title_oz = $request['title_oz'];
        $news->body_uz = $request['body_uz'];
        $news->body_ru = $request['body_ru'];
        $news->body_oz = $request['body_oz'];
        $news->desc_oz = $request['desc_oz'];
        $news->desc_uz = $request['desc_uz'];
        $news->desc_ru = $request['desc_ru'];
        $news->category = $request['category'];
        $news->region = $request['region'];
        $news->image = $fileNameToStore;
        $news->url = $request['url'];
        $news->type = $type;
        $news->save();
        return redirect()->route('news.index');

    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
    }

    public function addTag(Request $request, News $news)
    {
        $request->validate([
            'tag_id' => 'required',
        ]);
        if (!News_tag::where(['tag_id' => $request->tag_id, 'news_id' => $news->id])->first()) {
            $add = new News_tag();
            $add->news_id = $news->id;
            $add->tag_id = $request->tag_id;
            $add->save();
        } else {
            return redirect()->route('news.show', ['news' => $news->id])->with('error', 'Bu qoshilgan');
        }

        return redirect()->route('news.show', ['news' => $news->id]);
    }


    public function tanlov(News $news){

        if (!Tanlov::where(['news_id'=>$news->id])->first()){
            $tanlov=new Tanlov();
            $tanlov->news_id=$news->id;
            $tanlov->save();
        }
        return redirect()->route('news.show',['news'=>$news->id]);

    }
    public function del(News_tag $tag){
        $news_id = $tag->news_id;
        $tag->delete();
//        return redirect()->route('news.show',['news' => $news_id]);
        return redirect()->back();
    }
}
