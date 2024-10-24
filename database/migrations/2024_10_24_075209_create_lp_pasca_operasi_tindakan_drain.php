<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpPascaOperasiTindakanDrain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lp_pasca_operasi_tindakan_drain', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('lp_pasca_operasi_tindakan_id', 36)->nullable();
            $table->string('reg_no')->nullable();
            $table->string('jenis_drain')->nullable();
            $table->string('letak_pemasangan')->nullable();
            $table->string('lama_pemasanngan')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('lp_pasca_operasi_tindakan_drain');
    }
}
