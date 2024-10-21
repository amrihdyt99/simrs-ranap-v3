<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_cancelations', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->string('reg_no')->nullable();
            $table->string('medrec_no')->nullable();
            $table->string('patient_name')->nullable();
            $table->timestamp('cancelation_date')->nullable();
            $table->string('cancelation_reason')->nullable();
            $table->string('cancelation_by')->nullable();
            $table->string('cancelation_by_name')->nullable();
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
        Schema::dropIfExists('registration_cancelations');
    }
};
