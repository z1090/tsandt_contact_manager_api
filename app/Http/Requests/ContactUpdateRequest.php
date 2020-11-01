<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!auth()->user()->tokenCan('write')) {
            abort(403, "You do not have the correct permissions.");
        } else {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" => ["string", "max:50"],
            "last_name" => ["string", "max:50"],
            "email" => ["email", "max:50", "unique:contacts,email"],
            "phone" => ["string", "max:15"],
            "company_id" => ["integer", "exists:companies,id"],
        ];
    }
}
