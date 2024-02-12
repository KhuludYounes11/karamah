<?php

namespace App\Http\Resources;

use App\Models\Statistic;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;
class StatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
   {       
      
   $filteredContactData = json_decode( $this->value, true);
     
     return [
      'uuid'=>$this->uuid,
      'name'=>$this->name,
      'value' =>$filteredContactData,
    //  'match'=> new MatcheResource($this->matche),
     


   ];
}
}
