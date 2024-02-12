<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
class Association extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'boss',
        'image','desciption','country','sport_id'
    ];
       protected $casts = [
        'sport_id'=>'integer',
    ];
    
    public function sport():object
    {
        return $this->belongsTo(Sport::class);
    }
    public function topFans():object
    {
        return $this->hasOne(TopFan::class);
    }
    public function videos():MorphMany
    {
     return $this->morphMany(Video::class,'video_able');
    }
}
