<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'win',
        'lose','draw','+/-','points','play','seasone_id','club_id'
    ];
    protected $casts = [
        'win'=>'integer',
        'draw'=>'integer',
        'lose'=>'integer',
        '+/-'=>'integer',
        'matche_id'=>'integer',
        'club_id'=>'integer',
    ];
    public function seasion():object
    {
        return $this->belongsTo(Seasone::class);
    }
    public function club():object
    {
        return $this->belongsTo(Club::class);
    }
    
}
