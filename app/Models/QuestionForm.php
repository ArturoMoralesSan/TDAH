<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionForm extends Model
{
    use HasFactory;

    /**
     * Get the relationship with diagnostic form.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function DiagnosticForm()
    {
        return $this->belongsTo(DiagnosticForm::class);
    }


    /**
     * Get the relationship with diagnostic form.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
