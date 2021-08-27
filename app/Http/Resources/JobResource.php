<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'title'=>$this->title,
            'description'=> $this->description,
            'salary' => $this->salary,
            'category_id' =>$this->category_id,
            'company_id' => $this->company_id,
            'type_id' => $this->type_id,
            'image'=> $this->image

        ];
    }
}
