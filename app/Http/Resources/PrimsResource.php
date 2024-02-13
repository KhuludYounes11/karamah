<?php

namespace App\Http\Resources;

use App\Models\Prime;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class PrimsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $date=Carbon::setLocale('ar');
        return [
            
            'uuid' => $this->uuid,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'type' => $this->type,
            'season' => $this->seasone->name,
         
            'sport_name' => $this->sport->name,
        
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
  
}
