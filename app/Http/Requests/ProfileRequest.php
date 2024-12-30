<?php

namespace App\Http\Requests;

class ProfileRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:160',
            'lastname' => 'required|string|max:160',
        ];
    }


    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.string'      => 'El nombre debe ser una cadena de caracteres.',
            'name.max'         => 'El nombre no debe exceder :max caracteres.',
            'lastname.string'      => 'El nombre debe ser una cadena de caracteres.',
            'lastname.max'         => 'El nombre no debe exceder :max caracteres.',
        ];
    }
}