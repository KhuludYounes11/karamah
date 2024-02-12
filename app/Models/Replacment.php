<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replacment extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'inplayer_id',
        'outplayer_id',
        'matche_id'
    ];
    protected $casts = [
        'inplayer_id' => 'integer',
        'outplayer_id' => 'integer',
        'matche_id' => 'integer',
    ];
    
    public function inplayer(): object
    {
        return $this->belongsTo(Player::class, 'inplayer_id');
    }
    public function outplayer(): object
    {
        return $this->belongsTo(Player::class, 'outplayer_id');
    }
    public function match(): object
    {
        return $this->belongsTo(Matche::class, 'matche_id');
    }
}
