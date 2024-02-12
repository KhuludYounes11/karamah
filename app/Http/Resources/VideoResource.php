<?php

namespace App\Http\Resources;



use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Matche;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class VideoResource extends JsonResource
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
            'url'=>$this->url,
            'description' =>$this->description,
            'created_at'=>$this->created_at->diffForHumans(),
    
         ];
    }

