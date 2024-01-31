<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seasone extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'start_date','end_date'
    ];
    protected $casts = [
        'start_date'=>'date',
        'end_date'=>'date',
    ];
    public function prime():object
    {
        return $this->hasMany(Prime::class);
    }
    public function match():object
    {
        return $this->hasMany(Matche::class);
    }
    public function standing():object
    {
        return $this->hasMany(Standing::class);
    }
    public function wear():object
    {
        return $this->hasMany(Wear::class);
    }
}
