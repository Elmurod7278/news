<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;


    }


    public function index(Request $request)
    {
        $query=Category::orderBy('created_at','Desc');

        if (!empty($value = $request->get('name_uz'))) {
            $query->where('name_uz', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('name_oz'))) {
            $query->where('name_oz', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('name_ru'))) {
            $query->where('name_ru', $value);
        }
        $categories=$query->paginate(4);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request){
        $date=$request->validate([
            'name_uz'=>'required',
            'name_ru'=>'required',
            'name_oz'=>'required',
        ]);

        Category::create($date);
        return redirect()->route('category.index');
    }
    public function show(Category $category){
         return view('admin.category.show',['category'=>$category]);
    }
    public function edit(Category $category){
         return view('admin.category.edit',['category'=>$category]);
    }
    public function update(Request $request,Category $category){
        $date=$request->validate([
            'name_uz'=>'required',
            'name_ru'=>'required',
            'name_oz'=>'required',
        ]);
        $category->update($date);
        return redirect()->route('category.index');

    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('category.index');
    }

    public function catser(Request $request){



    }
}
