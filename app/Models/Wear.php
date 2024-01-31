<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wear extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'image',
        'seasone_id','sport_id'
    ];
    protected $casts = [
        'seasone_id'=>'integer',
        'sport_id'=>'integer'
    ];
    public function sport():object
    {
        return $this->belongsTo(Sport::class);
    }
    public function seasion():object
    {
        return $this->belongsTo(Seasone::class);
    }
}
