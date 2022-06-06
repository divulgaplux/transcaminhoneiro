<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Shipping extends JsonResource
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
            'truck_id' => $this->truck_id,
            'client' => $this->client,
            'origin' => $this->origin,
            'destination' => $this->destination,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'cellphone' => $this->cellphone,
            'weight' => $this->weight,
            'value_suggested' => $this->value_suggested,
            'insurance_price' => $this->insurance_price,
            'distance' => $this->distance,
            'company_truck_id' => $this->company_truck_id,
            'status' => $this->status,
            'have_insurance' => $this->have_insurance,
            'request_id' => $this->request_id,
            'is_actived' => $this->is_actived,

            'truck' => new Truck($this->truck),
            'company' => new Company($this->company),
            // 'user' => new UserComplete($this->user)
        ];
    }
}


