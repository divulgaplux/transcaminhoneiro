<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Truck extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'typetruck' => $this->typetruck,
            'bodywork' => $this->bodywork,
            'volume' => $this->volume,
            'axes' => $this->axes,
            'limit' => $this->limit,
            'is_actived' => $this->is_actived,

            // 'companies' => Company::collection($this->companies)
        ];
    }
}
