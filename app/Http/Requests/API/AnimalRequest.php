<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
            "name" => ["required", "string", "max:100"],
            "type" => ["required", "string", "max:100"],
            "date_of_birth" => ["required", "date"],
            "weight" => ["required", "numeric"],
            "height" => ["required", "numeric"],
            "biteyness" => ["required", "numeric", "max:5"],
            "treatments" => ["required", "array"], // check treatments is an array
            "treatments.*" => ["string", "max:30"], // check members of treatments are strings
          ];
    }
}
