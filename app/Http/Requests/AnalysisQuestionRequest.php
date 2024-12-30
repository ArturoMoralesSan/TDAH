<?php

namespace App\Http\Requests;
use App\Models\AnalysisForms;


class AnalysisQuestionRequest extends FormRequest
{
    public function rules()
    {
        $rules = [];
        $formId = $this->route('id');
        $form = AnalysisForms::with('diagnosticform.questionsform.question')->find($formId);
        
        if ($form && !$form->diagnosticform->questionsform->isEmpty()) {
            foreach ($form->diagnosticform->questionsform as $question) {
                $rules["question-{$question->question_id}"] = 'required|max:80';
            }
        }

        return $rules;
    }
}
