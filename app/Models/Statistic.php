<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'uuid',
        'value','matche_id'
    ];
    protected $casts = [
        'matche_id'=>'integer',
       // 'value'=>'json'
    ];
    public function matche():object
    {
        return $this->belongsTo(Matche::class,'matche_id');
    }

}
