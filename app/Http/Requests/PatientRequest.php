<?php

namespace App\Http\Requests;

use App\Rules\NotLowercase;
use App\Rules\NotUppercase;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', new NotUppercase, new NotLowercase, 'max:100'],
            'first_last_name' => ['required', new NotUppercase, new NotLowercase, 'max:100'],
            'second_last_name' => ['required', new NotUppercase, new NotLowercase, 'max:100'],
            'age' => ['required','max:2'],
            'sex' => ['required', new NotUppercase, new NotLowercase, 'max:60'],
            'father_name' => ['required', new NotUppercase, new NotLowercase, 'max:100'],
            'mother_name' => ['required', new NotUppercase, new NotLowercase, 'max:100'],
            'address' => ['required', new NotUppercase, new NotLowercase, 'max:200'],
            'phone' => ['required', 'max:10']
        
        ];
    }
}
