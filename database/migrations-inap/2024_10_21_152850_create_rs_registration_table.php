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
        Schema::create('rs_registration', function (Blueprint $table) {
            $table->string('reg_no')->primary();
            $table->string('reg_medrec')->nullable();
            $table->string('reg_lama', 20)->nullable();
            $table->string('reg_status')->nullable();
            $table->dateTime('reg_tgl')->nullable()->useCurrent();
            $table->time('reg_jam')->nullable();
            $table->string('reg_poli')->nullable();
            $table->string('reg_dokter')->nullable();
            $table->string('reg_ruangan')->nullable();
            $table->string('reg_tipe_kunj')->nullable();
            $table->string('reg_menit')->nullable();
            $table->string('reg_prioritas')->nullable();
            $table->string('reg_cara_bayar')->nullable();
            $table->string('reg_no_dokumen')->nullable();
            $table->string('reg_class')->nullable();
            $table->string('reg_no_kartu')->nullable();
            $table->string('reg_referal')->nullable();
            $table->string('reg_diagnosis')->nullable();
            $table->string('reg_corp')->nullable();
            $table->string('reg_pjawab')->nullable();
            $table->string('reg_cttn_kunj')->nullable();
            $table->string('reg_cttn')->nullable();
            $table->time('reg_datang')->nullable();
            $table->time('reg_pemeriksaan_mulai')->nullable();
            $table->time('reg_pemeriksaan_selesai')->nullable();
            $table->time('reg_selesai')->nullable();
            $table->integer('reg_pulang_partials')->default(0);
            $table->integer('reg_discharge')->nullable();
            $table->string('reg_deleted')->nullable();
            $table->string('reg_deleted_by')->nullable();
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
        Schema::dropIfExists('rs_registration');
    }
};
