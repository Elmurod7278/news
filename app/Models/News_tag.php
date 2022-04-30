<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News_tag extends Model
{
    use HasFactory;

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
