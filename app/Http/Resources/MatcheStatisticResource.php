<?php

namespace App\Http\Resources;

use App\Models\Matche;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class MatcheStatisticResource extends JsonResource
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
            'uuid'=>$this->uuid,
              'when' =>$this->when->isoFormat('LLLL'),
               'play_ground' =>$this->play_ground,
               'club1name' =>$this->club1->name,
                 'club1' =>$this->club1->logo,
                 'club2name' =>$this->club2->name,
                 'club2' =>$this->club2->logo,
                 'round'=>$this->round,
                 'status' =>$this->status,
                 'plan' => $this->plan,
                 'channel' =>$this->channel,
                'statistic' => StatisticResource::collection($this->statistic),
        ];  
    }
}
