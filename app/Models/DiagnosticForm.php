<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticForm extends Model
{
    use HasFactory;

    protected $appends = ['count_questions'];


    public function getCountQuestionsAttribute() {
        return $this->questionsform->count();
    }

    /**
     * Get the relationship with questionform.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionsform()
    {
        return $this->hasMany(QuestionForm::class);
    }

    /**
     * Get the relationship with diagnostic form.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diagnostic()
    {
        return $this->belongsTo(Diagnostic::class);
    }

    /**
     * Get the relationship with patient.
     *
     */
    public function analysisforms()
    {
        return $this->hasMany(AnalysisForms::class, 'diagnostic_form_id');
    }
}
