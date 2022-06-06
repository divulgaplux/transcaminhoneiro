<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Request extends JsonResource
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
            'company_id' => $this->company_id,
            'shipping_id' => $this->shipping_id,
            'value' => $this->value,
            'time_approximate' => $this->time_approximate,
            'observation' => $this->observation,
            'date' => $this->date,
            'status' => $this->status,
            'date_acceptation' => $this->date_acceptation,
            'is_actived' => $this->is_actived,

            'company' => new Company($this->company),
            'shipping' => new Shipping($this->shipping),

            // 'shippings' => Shipping::collection($this->shippings),
        ];
    }
}
