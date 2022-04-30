<?php

namespace App\Http\Controllers;

use App\Models\Tanlov;
use Illuminate\Http\Request;

class TanlovController extends Controller
{
    public function index(){
        $tanlovs=tanlov::paginate(20);
        return view('admin.tanlovs.index',compact('tanlovs'));
    }
    public function create()
    {
        return view('admin.tanlovs.create');
    }
    public function store(Request $request){
        $date=$request->validate([
            'news_id'=>'required',
        ]);

        tanlov::create($date);
        return redirect()->route('tanlov.index');
    }
    public function show(Tanlov $tanlov){
        return view('admin.tanlovs.show',['tanlov'=>$tanlov]);
    }
    public function edit(Tanlov  $tanlov){
        return view('admin.tanlovs.edit',['tanlov'=>$tanlov]);
    }
    public function update(Request $request,Tanlov $tanlov){
        $date=$request->validate([
            'news_id'=>'required',
        ]);

        $tanlov->update($date);
        return redirect()->route('tanlov.index');

    }
    public function destroy(Tanlov $tanlov){
        $tanlov->delete();
        return redirect()->route('tanlov.index');
    }
}
