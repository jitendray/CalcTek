<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CalcTekRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response = json_decode($this->response);
        return [
            'id' => $this->id,
            'expression' => $response->expression,
            'result' => $response->result
        ];
    }
}
