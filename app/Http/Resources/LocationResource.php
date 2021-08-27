<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'country'=>$this->country,
            'state'=>$this->state,
             'city'=> $this->city,
             'job_id'=> $this->job_id
        ];
    }
}
