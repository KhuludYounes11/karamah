<?php

namespace App\Http\Resources;

use App\Models\Player;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class PlayerResource extends JsonResource
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
            'play'=>$this->play,
            'from'=>$this->from,
            'first_club'=>$this->first_club,
            'career'=>$this->career,
            'high'=>$this->high,
            'number'=>$this->number,
            'born'=>$this->born->format('d F Y'),
            'sport'=>$this->sport->name,
            'created_at'=>$this->created_at->diffForHumans(),
            'updated_at'=>$this->updated_at->diffForHumans(),  
       ];
    }
}
