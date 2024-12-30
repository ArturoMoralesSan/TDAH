<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysisForms extends Model
{
    use HasFactory;


    /**
     * Get the relationship with diagnostic form.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diagnosticform()
    {
        return $this->belongsTo(DiagnosticForm::class, 'diagnostic_form_id');
    }

    /**
     * Get the relationship with analysis patient.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function analysispatient()
    {
        return $this->belongsTo(AnalysisPatient::class);
    }
}
