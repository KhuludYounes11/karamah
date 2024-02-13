<?php

namespace App\Http\Resources;
use App\Models\Standing;
use Illuminate\Http\Resources\Json\JsonResource;

class StandingResource extends JsonResource
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
            'uuid' => $this->uuid,
            'name' => $this->club->name,
            'win' => $this->win,
            'lose' => $this->lose,
            'draw' => $this->draw,
            // '+/-' => $this->+/-,
            'points' => $this->win * 3  + $this->draw * 1,
            'play' => $this->play,

        ];
    }
}
