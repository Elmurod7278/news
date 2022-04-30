<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\NewsService;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{

    private $service;

    public function __construct(TagService $service)
    {
        $this->service = $service;

    }
    public function index(Request $request){
        $tags=$this->service->findTag($request)->paginate(5);
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
        return redirect()->route('tag.index');
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
        return redirect()->route('tag.index');

    }
    public function destroy(Tag $tag){
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
