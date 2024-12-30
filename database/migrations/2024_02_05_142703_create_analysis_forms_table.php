<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysisFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysis_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('analysis_patient_id')->constrained()->onDelete('cascade'); // Relación con patients
            $table->foreignId('diagnostic_form_id')->constrained()->onDelete('cascade'); // Relación con diagnostics
            $table->date('completed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analysis_forms');
    }
}
