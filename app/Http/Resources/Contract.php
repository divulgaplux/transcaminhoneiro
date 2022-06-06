<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Contract extends JsonResource
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
            'company_id' => $this->company_id,
            'client_id' => $this->client_id,
            'services' => $this->services,
            'collect' => $this->collect,
            'is_actived' => $this->is_actived,

            'company' => new Company($this->company),
            'truck' => new Truck($this->truck),
        ];
    }
}
