<?php

namespace App\Http\Resources;
use App\Models\Association;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class AssociationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {$date=Carbon::setLocale('ar');
        return [
            'uuid' => $this->uuid,
            'boss' => $this->boss,
            'image' => $this->image,
            'description' => $this->description,
            'country' => $this->country,
            'sport_id' => $this->sport_id,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}

