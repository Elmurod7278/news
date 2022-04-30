<?php


namespace App\Services;


use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagService
{
    public function findTag(Request $request)
    {


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
        return $query;
    }


}
