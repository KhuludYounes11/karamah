<?php

namespace App\Http\Resources;

use App\Models\Matche;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class MatchDateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {$date=Carbon::setLocale('ar');
       
        return
        [
         'uuid'=>$this->uuid,
         'when'=>$this->when->translatedFormat('l j F Y'),
        ];
    }
}
