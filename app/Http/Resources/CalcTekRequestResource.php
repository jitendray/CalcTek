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
        if (200 === (int)$this->status_code) {
            return [
                'id' => $this->id,
                'expression' => $response->expression,
                'result' => $response->result,
                'success' => true
            ];
        }

        $requestPayload = json_decode($this->request);
        return [
            'id' => $this->id,
            'expression' => $requestPayload->expression,
            'errors' => $response->errors,
            'success' => false
        ];
    }
}
