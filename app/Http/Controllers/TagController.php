<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\NewsService;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index(Request $request){
        $query=Tag::orderBy('created_at','Desc');

        if (!empty($value = $request->get('name_uz'))) {
            $query->where('name_uz', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('name_oz'))) {
            $query->where('name_oz', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('name_ru'))) {
            $query->where('name_ru', $value);
        }
        $tags=$query->paginate(5);
        return view('admin.tag.index',compact('tags'));
    }
    public function create()
    {
        return view('admin.tag.create');
    }
    public function store(Request $request){
        $date=$request->validate([
            'name_uz'=>'required',
            'name_ru'=>'required',
            'name_oz'=>'required',
        ]);

        Tag::create($date);
        return redirect()->route('admin.tag.index');
    }
    public function show(Tag $tag){
        return view('admin.tag.show',['tag'=>$tag]);
    }
    public function edit(Tag $tag){
        return view('admin.tag.edit',['tag'=>$tag]);
    }
    public function update(Request $request,Tag $tag){
        $date=$request->validate([
            'name_uz'=>'required',
            'name_ru'=>'required',
            'name_oz'=>'required',
        ]);

        $tag->update($date);
        return redirect()->route('admin.tag.index');

    }
    public function destroy(Tag $tag){
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
