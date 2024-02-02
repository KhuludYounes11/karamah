<?php

namespace App\Http\Resources;
use App\Models\Matche;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class MatcheResource extends JsonResource
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
            'when' =>$this->when->diffForHumans(),
             'status' =>$this->status,
             'plan' => $this->plan,
             'channel' =>$this->channel,
             'round' =>$this->round,
             'play_ground' =>$this->play_ground,
             'seasone' =>$this->seasion->name,
             'club1' =>$this->club1->name,
             'club2' =>$this->club2->name,
             'created_at'=>$this->created_at->diffForHumans(),
             'updated_at'=>$this->updated_at->diffForHumans(),  
        ];
    }
    }

