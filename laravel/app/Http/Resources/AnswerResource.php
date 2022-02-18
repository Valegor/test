<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
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
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'template_id' => $this->template_id,
            'author_id' => $this->author_id,
            'author_name' => $this->author_name,
            'author_email' => $this->author_email,
            'aviable' => $this->aviable,
            'object' => $this->object,            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
