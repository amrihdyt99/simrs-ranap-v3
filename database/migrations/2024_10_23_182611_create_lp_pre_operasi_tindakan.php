<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpPreOperasiTindakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lp_pre_operasi_tindakan', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('lp_pre_operasi_id', 36)->nullable();
            $table->string('reg_no')->nullable();
            $table->string('kode_tindakan')->nullable();
            $table->boolean('persiapan_alat_khusus')->nullable();
            $table->string('catatan_persiapan_alat_khusus')->nullable();
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
        Schema::dropIfExists('lp_pre_operasi_tindakan');
    }
}
