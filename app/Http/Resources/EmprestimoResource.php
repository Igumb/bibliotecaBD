<?php

namespace App\Http\Resources;
use App\Emprestimo;
use Illuminate\Http\Resources\Json\JsonResource;

class EmprestimoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'status' => $this->status,
            'dataDeInicio' => $this->dataDeInicio,
            'dataDeTermino' => $this->dataDeTermino,
        ];
    }
}
