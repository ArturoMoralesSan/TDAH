<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosticFormRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'form' => ['required','max:100'],
            'diagnostic_id' => ['required', 'max:255'],
        ];

        for($i = 1; $i <= $this->question_count; $i++) {
            $rules['question' . $i . '_question'] = 'required';
        }
        
        return $rules;
        
    }
}
