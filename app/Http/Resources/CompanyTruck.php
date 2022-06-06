<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyTruck extends JsonResource
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
            'board' => $this->board,
            'renavam' => $this->renavam,
            'brand' => $this->brand,
            'color' => $this->color,
            'city' => $this->city,
            'chassi' => $this->chassi,
            'model' => $this->model,
            'state' => $this->state,
            'country' => $this->country,
            'technology' => $this->technology,
            'year_of_manufacture' => $this->year_of_manufacture,
            'year_of_model' => $this->year_of_model,
            'is_actived' => $this->is_actived,

            'company' => new Company($this->company),
            'truck' => new Truck($this->truck),
        ];
    }
}
