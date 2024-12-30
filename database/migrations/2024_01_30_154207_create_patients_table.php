<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string("name"); 
            $table->string("first_last_name");
            $table->string("second_last_name");
            $table->unsignedInteger("age");
            $table->string("sex");
            $table->string("nationality");
            $table->string("mother_name");
            $table->string("father_name");
            $table->string("address");
            $table->unsignedInteger("phone");
            $table->unsignedInteger("optional_phone");
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
        Schema::dropIfExists('patients');
    }
}
