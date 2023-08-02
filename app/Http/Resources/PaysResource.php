<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaysResource extends JsonResource
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
           
            'id'=>$this->id,
            'nom'=>$this->name,
            'capital'=>$this->capital,
            'date'=>$this->created_at,
            'regions'=>$this->regions
        ];
    }
}
