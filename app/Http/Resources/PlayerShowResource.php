<?php

namespace App\Http\Resources;

use App\Models\Player;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class PlayerShowResource extends JsonResource
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
            'name' =>$this->name,
            'image' => $this->image,
           'play'=>$this->play,
            'high'=>$this->high."cm",
            'number'=>$this->number,
           'age'=>Carbon::parse($this->born)->age,
       ];
    }
}
