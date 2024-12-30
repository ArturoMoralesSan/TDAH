<?php

namespace App\Http\Requests;

use App\Rules\NotLowercase;
use App\Rules\NotUppercase;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => ['required', new NotUppercase, new NotLowercase, 'max:255'],
            'description' => ['required', new NotUppercase, new NotLowercase, 'max:255'],
        ];
    }
}
