<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    use HasFactory;

    protected $appends = ['count_forms'];


    public function getCountFormsAttribute() {
        return $this->diagnosticforms->count();
    }

    /**
     * Get the relationship with diagnosticForms.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diagnosticforms()
    {
        return $this->hasMany(DiagnosticForm::class);
    }

    public function anlysispatients()
    {
        return $this->hasMany(AnalysisPatient::class);
    }
}
