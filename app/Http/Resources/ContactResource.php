<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            "contact_id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "phone" => $this->phone,
            "company" => [
                "company_id" => $this->company->id,
                "company_name" => $this->company->company_name,
                "company_address" => $this->company->company_address
            ],
            "notes" => NoteResource::collection($this->notes)
        ];
    }
}
