<?php

namespace App\Http\Resources;

use App\Models\Boss;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class BossResource extends JsonResource
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
            'uuid'=>$this->uuid,
            'name' =>$this->name,
            'image' => $this->image,
            'start_year'=>$this->start_year,
            'created_at'=>$this->created_at->diffForHumans(),
            'updated_at'=>$this->updated_at->diffForHumans(),  
       ];
    }
}
