<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded=[''];

    const TYPE_NOT_CHECKED = 0;
    const TYPE_CHECKED = 1;

    public function categoryTable()
    {
        return $this->belongsTo(Category::class,'category','id');
    }


    public function tags()
    {
        return News_tag::where(['news_id' => $this->id]);
    }

}
