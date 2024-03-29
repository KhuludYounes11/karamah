<?php

namespace App\Http\Resources;
use App\Models\Replacment;
use Illuminate\Http\Resources\Json\JsonResource;

class ReplacmentResource extends JsonResource
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
            'inplayer' => $this->inplayer->name,
            'outplayer' => $this->outplayer->name,
            // 'matche' => $this->matche,

        ];
    }
}
