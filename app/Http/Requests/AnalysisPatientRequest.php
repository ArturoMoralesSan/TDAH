<?php

namespace App\Http\Requests;

class AnalysisPatientRequest extends FormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'patient_id' => ['required'],
           'diagnostic_id' => ['required'],
        ];
    }
}
