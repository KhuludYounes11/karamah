<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'title',
        'content','image','reads','type','information_able'
    ];
    protected $casts = [
        'type'=>'enum'
    ];

    public function videos():MorphMany
    {
     return $this->morphMany(Video::class,'video_able');
    }
   
}
