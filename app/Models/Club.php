<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Club extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'address',
        'logo',
        'sport_id'
    ];
    protected $casts = [
        'sport_id' => 'integer',
    ];

    // ------ رياضة النادي --------
    public function sport(): object
    {
        return $this->belongsTo(Sport::class);
    }

    //--------- احصائيات  ----------
    public function statistic(): object
    {
        return $this->hasMany(Statistic::class, 'matche_id');
    }

    public function match(): object
    {
        return $this->hasMany(Matche::class);
    }
    //--------- ترتيب الفرق بالدوري-------
    public function standing(): object
    {
        return $this->hasMany(Standing::class);
    }
    //------- معلومات مختلفة عن النادي و المباريات---------
    public function information(): MorphMany
    {
        return $this->morphMany(Information::class, 'information_able');
    }

    public function videos(): MorphMany
    {
        return $this->morphMany(Video::class, 'video_able');
    }
}
