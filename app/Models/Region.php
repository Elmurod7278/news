<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $guarded=[''];

    public function news()
    {
        return $this->hasMany(News::class,'category','id');
    }
}
