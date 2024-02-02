<?php

namespace App\Http\Resources;

use App\Models\Information;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class InformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {return [
        'title' =>$this->title,
        'content' => $this->content,
        'image'=>$this->image,
        'reads'=>$this->reads,
        'type'=>$this->type,
        'created_at'=>$this->created_at->diffForHumans(),
        'updated_at'=>$this->updated_at->diffForHumans(),  
   ];
}
}
