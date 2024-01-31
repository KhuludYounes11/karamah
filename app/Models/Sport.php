<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'uuid',
        'image',
    ];
  
    public function association():object
    {
        return $this->hasMany(Association::class);
    }
    public function prime():object
    {
        return $this->hasMany(Prime::class);
    }
    public function club():object
    {
        return $this->hasMany(Club::class);
    }
    public function employee():object
    {
        return $this->hasMany(Employee::class);
    }
    public function player():object
    {
        return $this->hasMany(Player::class);
    }
    public function wear():object
    {
        return $this->hasMany(Wear::class);
    }
    public function information():MorphMany
    {
     return $this->morphMany(Information::class,'video_able');
    }
}
