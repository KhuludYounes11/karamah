<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopFan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'uuid',
        'association_id',
    ];
    protected $casts = [
        'association_id'=>'integer',
    ];
    public function association():object
    {
        return $this->belongsTo(Association::class);
    }
 
}
