<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Client extends JsonResource
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
            'name' => $this->name,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'cnh' => $this->cnh,
            'cnh_state' => $this->cnh_state,
            'is_actived' => $this->is_actived,

            'company' => new Company($this->company),
        ];
    }
}
