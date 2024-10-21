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
        Schema::create('rs_m_resume_pasien', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no', 200)->nullable();
            $table->string('kode_dokter', 200)->nullable();
            $table->text('terapi_yang_diberikan')->nullable();
            $table->text('tindakan_atau_operasi')->nullable();
            $table->date('tanggal_tindakan')->nullable();
            $table->string('icd_9_tindakan', 20)->nullable();
            $table->text('penyebab_luar')->nullable();
            $table->string('icd_10_penyebab', 20)->nullable();
            $table->string('alasan_pulang', 200)->nullable();
            $table->string('kondisi_pasien', 150)->nullable();
            $table->enum('obat_dibawa', ['y', 't'])->nullable();
            $table->date('tanggal_resume')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_m_resume_pasien');
    }
};
