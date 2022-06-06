<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Rating extends JsonResource
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
            'shipping_id' => $this->shipping_id,
            'rated_id' => $this->rated_id,
            'evaluator_id' => $this->evaluator_id,
            'description' => $this->description,
            'evaluation' => $this->evaluation,
            'is_actived' => $this->is_actived,

            'shipping' => new Shipping($this->shipping),
        ];
    }
}
