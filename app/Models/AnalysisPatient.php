<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysisPatient extends Model
{
    use HasFactory;


    /**
     * Get the relationship with diagnostic.
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get the relationship with patient.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function analysisforms()
    {
        return $this->hasMany(AnalysisForms::class);
    }
}
