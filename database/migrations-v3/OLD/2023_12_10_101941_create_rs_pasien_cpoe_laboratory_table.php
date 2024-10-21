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
        Schema::create('rs_pasien_cpoe_laboratory', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no');
            $table->string('planing_start_date')->nullable();
            $table->string('order_type')->nullable();
            $table->string('medical_diagnose')->nullable();
            $table->string('gestraditional_age')->nullable();
            $table->text('notes')->nullable();
            $table->integer('cpoe_laboratory_id');
            $table->integer('order_by');
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
        Schema::dropIfExists('rs_pasien_cpoe_laboratory');
    }
};
