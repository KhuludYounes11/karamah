<?php

namespace App\Http\Resources;
use App\Models\Sport;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class SportResource extends JsonResource
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
             'name' =>$this->name,
             'image' => $this->image,
             'created_at'=>$this->created_at->diffForHumans(),
             'updated_at'=>$this->updated_at->diffForHumans(),  
        ];
    }
}
