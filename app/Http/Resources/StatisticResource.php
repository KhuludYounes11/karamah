<?php

namespace App\Http\Resources;

use App\Models\Statistic;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class StatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
   {return [
        'name' =>$this->name,
        'value' => $this->value,
        'club1'=>$this->match->club1->name,
        'club2'=>$this->match->club2->name,
        'created_at'=>$this->created_at->diffForHumans(),
        'updated_at'=>$this->updated_at->diffForHumans(),  
   ];
}
}
