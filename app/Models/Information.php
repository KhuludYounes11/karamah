<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class Information extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'title',
        'content',
        'image',
        'reads',
        'type',
        'information_able'
    ];
    protected $casts = [

        //'type' => 'enum'
    ];

   
    public function information_able():MorphTo{
        return $this->morphTo();
    }
    public function video():MorphMany

    {
        return $this->morphMany(Video::class, 'video_able');
    }
}
