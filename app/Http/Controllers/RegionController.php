<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Services\RegionService;
use App\Services\TagService;
use Illuminate\Http\Request;

class RegionController extends Controller
{

    public function index(Request $request){
        $query=Region::orderBy('created_at','Desc');

        if (!empty($value = $request->get('name_uz'))) {
            $query->where('name_uz', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('name_oz'))) {
            $query->where('name_oz', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('name_ru'))) {
            $query->where('name_ru', $value);
        }
        $regions = $query->paginate(4);

        return view('admin.regions.index',compact('regions'));
    }
    public function create()
    {
        return view('admin.regions.create');
    }
    public function store(Request $request){
        $date=$request->validate([
            'name_uz'=>'required',
            'name_ru'=>'required',
            'name_oz'=>'required',
        ]);

        Region::create($date);
        return redirect()->route('regions.index');
    }
    public function show(Region $region){
        return view('admin.regions.show',['region'=>$region]);
    }
    public function edit(Region $region){
        return view('admin.regions.edit',['region'=>$region]);
    }
    public function update(Request $request,Region $region){
        $date=$request->validate([
            'name_uz'=>'required',
            'name_ru'=>'required',
            'name_oz'=>'required',
        ]);

        $region->update($date);
        return redirect()->route('regions.index');

    }
    public function destroy(Region $region){
        $region->delete();
        return redirect()->route('regions.index');
    }
}
