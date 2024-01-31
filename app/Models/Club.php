<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'address','logo','sport_id'
    ];
    protected $casts = [
        'sport_id'=>'integer',
    ];
    public function sport():object
    {
        return $this->belongsTo(Sport::class);
    }
    public function statistic():object
    {
        return $this->hasMany(Statistic::class,'matche_id');
    }
    public function match():object
    {
        return $this->hasMany(Matche::class);
    }
  
    public function standing():object
    {
        return $this->hasMany(Standing::class);
    }
  
   
}
