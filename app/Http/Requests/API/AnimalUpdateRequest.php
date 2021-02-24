<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class AnimalUpdateRequest extends FormRequest
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
            "name" => ["nullable", "string", "max:100"],
            "type" => ["nullable", "string", "max:100"],
            "date_of_birth" => ["nullable", "date"],
            "weight" => ["nullable", "numeric"],
            "height" => ["nullable", "numeric"],
            "biteyness" => ["nullable", "numeric", "max:5"],
          ];
    }
}
