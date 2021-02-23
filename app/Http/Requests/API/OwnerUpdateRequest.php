<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class OwnerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" => ["nullable", "string", "max:30"],
            "last_name" => ["nullable", "string", "max:30"],
            "telephone" => ["nullable", "numeric"],
            "email" => ["nullable", "email", "unique:App\Models\Owner,email"],
            "address_1" => ["nullable", "string", "max:50"],
            "address_2" => ["nullable", "string", "max:50"],
            "town" => ["nullable", "string", "max:30"],
            "postcode" => ["nullable", "string", "max:11"],
            ];
    }
}
