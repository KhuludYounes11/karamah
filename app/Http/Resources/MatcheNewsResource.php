<?php

namespace App\Http\Resources;
use App\Models\Matche;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class MatcheNewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    { $date=Carbon::setLocale('ar');
        $news=$this->information->where('type','news');
        return[
        'uuid'=>$this->uuid,
        'club1name' =>$this->club1->name,
        'club1' =>$this->club1->logo,
        'club2name' =>$this->club2->name,
        'club2' =>$this->club2->logo,
        'news'=> InformationResource::collection($news),
    ];
    }
}
