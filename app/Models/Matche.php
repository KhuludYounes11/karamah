<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'when',
        'status','plan','channel','round','play_ground','seasone_id','club1_id','club2_id'
    ];
    protected $casts = [
        'inplayer'=>'integer',
        'outplayer'=>'integer',
        'matche_id'=>'integer',
        'status'=>'enum'
    ];
    public function plan():object
    {
        return $this->hasOne(Plan::class,'matche_id');
    }
    public function club1():object
    {
        return $this->belongsTo(Club::class,'club1_id');
    }
    public function club2():object
    {
        return $this->belongsTo(Club::class,'club2_id');
    }
    public function seasion():object
    {
        return $this->belongsTo(Seasone::class);
    }
    public function replacment():object
    {
        return $this->hasMany(Replacment::class,'matche_id');
    }
    public function videos():MorphMany
    {
     return $this->morphMany(Video::class,'video_able');

    }
    public function information():MorphMany
    {
     return $this->morphMany(Information::class,'information_able');
    }
   
}

