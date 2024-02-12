<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'url',
        'description','video_able'
    ];
  
    public function video_able():MorphTo{
        return $this->morphTo();
    }
}
