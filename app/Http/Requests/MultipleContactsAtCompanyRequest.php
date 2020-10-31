<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultipleContactsAtCompanyRequest extends FormRequest
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
            "contacts" => ["required", "array"],

            "contacts.*" => [
                "first_name" => ["required", "string", "max:50"],
                "last_name" => ["required", "string", "max:50"],
                "email" => ["required", "email", "max:50"],
                "phone" => ["required", "string", "max:15"]
            ]
        ];
    }
}
