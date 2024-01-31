<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid','name',
        'jop_type',
        'work','sport_id'
    ];
    protected $casts = [
        'sport_id'=>'integer',
        'jop_type'=>'enum'
    ];
    public function sport():object
    {
        return $this->belongsTo(Sport::class);
    }
}
