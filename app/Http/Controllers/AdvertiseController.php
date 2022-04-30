<?php

namespace App\Http\Controllers;
use App\Models\Advertise;
use App\Models\News;
use Illuminate\Http\Request;
class AdvertiseController extends Controller
{
    public function index(){
        $advertises = Advertise::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.advertise.index', compact('advertises'));
    }
    public function create()
    {
        $advertises = Advertise::all();
        return view('admin.advertise.create', compact('advertises'));

    }
    public function store(Request $request)
    {
        $date=$request->validate([
            'link'=>'required',
            'image'=>'required',
        ]);


        if ($request->hasFile('image')) {
            $fileNameWidthExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWidthExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . time() . "." . $ext;
            $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }
        $date['image'] = $fileNameToStore;
        $adv = new Advertise();
        $adv->link=$date['link'];
        $adv->image=$fileNameToStore;
        $adv->save();
        return redirect()->route('advertises.index');
    }
    public function edit(Advertise $advertise){
     return view('admin.advertise.edit',compact('advertise'));
    }
    public function update(Request $request,Advertise $advertise){
        $date=$request->validate([
            'link'=>'required',
            'image'=>'required',
        ]);


        if ($request->hasFile('image')) {
            $fileNameWidthExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWidthExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . time() . "." . $ext;
            $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }
        $date['image'] = $fileNameToStore;

        $advertise->link=$date['link'];
        $advertise->image=$fileNameToStore;
        $advertise->save();
        return redirect()->route('advertises.index');
    }
    public function destroy(Advertise $advertise){
        $advertise->delete();
        return redirect()->route('advertises.index');
    }

}
