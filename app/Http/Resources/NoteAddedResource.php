<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteAddedResource extends JsonResource
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
            "note_id" => $this->id,
            "note_text" => $this->note_text,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "contact" => [
                "contact_id" => $this->contact->id,
                "first_name" => $this->contact->first_name,
                "last_name" => $this->contact->last_name,
                "email" => $this->contact->email,
                "phone" => $this->contact->phone,
                "company_id" => $this->contact->company->id,
                "company_name" => $this->contact->company->company_name,
                ]
        ];
    }
}
