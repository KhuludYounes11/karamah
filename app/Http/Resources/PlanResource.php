<?php

namespace App\Http\Resources;
use App\Models\Plan;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
           
            //'uuid' => $this->uuid,
            'status' => $this->status,
            'player_id' => $this->player->name,
        //    'matche_id' => $this->matche_id,
        //    'created_at' => $this->created_at,
          //  'updated_at' => $this->updated_at,
        ];
    }
}
