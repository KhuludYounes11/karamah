<?php

namespace App\Http\Resources;
use App\Models\Seasone;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class SeasoneResource extends JsonResource
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
            'uuid'=>$this->uuid,
            'name'=>$this->name,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,


        ];
    }
}
