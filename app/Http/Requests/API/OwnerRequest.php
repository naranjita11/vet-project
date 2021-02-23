<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            "first_name" => ["required", "string", "max:30"],
            "last_name" => ["required", "string", "max:30"],
            "telephone" => ["required", "numeric"],
            "email" => ["required", "email", "unique:App\Models\Owner,email"],
            "address_1" => ["required", "string", "max:50"],
            "address_2" => ["nullable", "string", "max:50"],
            "town" => ["required", "string", "max:30"],
            "postcode" => ["required", "string", "max:11"],
            ];
    }
}
