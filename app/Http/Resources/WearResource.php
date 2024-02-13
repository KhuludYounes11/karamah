<?php

namespace App\Http\Resources;
use App\Models\Wear;
use Illuminate\Http\Resources\Json\JsonResource;

class WearResource extends JsonResource
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
            'image' => $this->image,
            'season' => $this->seasone->name,
            'sport' => $this->sport->name,
        ];
    }
}
