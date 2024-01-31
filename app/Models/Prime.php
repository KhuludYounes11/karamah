<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prime extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'description','image','type','seasone_id','sport_id'
    ];
    protected $casts = [
        'seasone_id'=>'integer',
        'sport_id'=>'integer','type'=>'enum'
    ];
    public function sport():object
    {
        return $this->belongsTo(Sport::class);
    }
    public function seasone():object
    {
        return $this->belongsTo(Seasone::class);
    }
}
