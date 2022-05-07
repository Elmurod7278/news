<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanlov extends Model
{
    use HasFactory;
    protected $guarded=['*'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
