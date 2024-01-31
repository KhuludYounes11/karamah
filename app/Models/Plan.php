<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'player_id',
        'matche_id','status'
    ];
    protected $casts = [
        'player_id'=>'integer',
        'matche_id'=>'integer',
        'status'=>'enum',
    ];
    public function player():object
    {
        return $this->belongsTo(Player::class);
    }
    public function match():object
    {
        return $this->belongsTo(Matche::class,'matche_id');
    }

}
