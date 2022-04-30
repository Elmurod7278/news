<?php

namespace App\Services;




use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsService
{
    public function findNews(Request $request)
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
        return $query;
    }


}
