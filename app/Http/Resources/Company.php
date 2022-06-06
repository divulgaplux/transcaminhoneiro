<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
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
            // 'user_id' => $this->id,
            'id' => $this->id,
            'documentation' => $this->documentation,
            'email' => $this->email,
            'corporative_name' => $this->corporative_name,
            'fantasy_name' => $this->fantasy_name,
            'adress' => $this->adress,
            'number' => $this->number,
            'neighborhood' => $this->neighborhood,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'phone' => $this->phone,
            'cellphone' => $this->cellphone,
            // 'ranking' => $this->ranking,
            // 'quatities' => $this->quatities,
            // 'is_truck' => $this->is_truck,
            // 'is_client' => $this->is_client,
            // 'is_recipent' => $this->is_recipent,
            'is_actived' => $this->is_actived,

            'truck' => new Truck($this->truck),
        ];
    }
}
