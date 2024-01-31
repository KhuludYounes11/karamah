<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replacment extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'inplayer',
        'outplayer','matche_id'
    ];
    protected $casts = [
        'inplayer'=>'integer',
        'outplayer'=>'integer',
        'matche_id'=>'integer',
    ];
    public function inplayer():object
    {
        return $this->belongsTo(Club::class,'inplayer_id');
    }
    public function outplayer():object
    {
        return $this->belongsTo(Club::class,'outplayer_id');
    }
    public function match():object
    {
        return $this->belongsTo(Matche::class,'matche_id');
    }


}
