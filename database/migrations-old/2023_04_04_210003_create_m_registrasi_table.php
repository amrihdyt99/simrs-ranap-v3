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
        Schema::connection('mysql2')->create('m_registrasi', function (Blueprint $table) {
            $table->string('reg_no')->primary();
            $table->string('reg_medrec')->nullable();
            $table->string('reg_lama')->nullable();
            $table->string('reg_status')->nullable();
            $table->string('reg_tgl')->nullable();
            $table->string('reg_jam')->nullable();
            $table->string('reg_poli')->nullable();
            $table->string('reg_dokter')->nullable();
            $table->integer('reg_dokter_care')->nullable();
            $table->integer('reg_perawat_care')->nullable();
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
            $table->string('reg_kategori')->nullable();
            $table->time('reg_datang')->nullable();
            $table->time('reg_pemeriksaan_mulai')->nullable();
            $table->time('reg_pemeriksaan_selesai')->nullable();
            $table->dateTime('reg_selesai')->nullable();
            $table->integer('reg_pulang_partials')->nullable();
            $table->integer('reg_discharge')->default(0);
            $table->integer('reg_user')->nullable();
            $table->string('reg_deleted')->nullable();
            $table->string('reg_deleted_by')->nullable();
            $table->timestamps();
            $table->string('bed', 250)->nullable();
            $table->string('service_unit', 250)->nullable();
            $table->string('departemen_asal', 250)->nullable();
            $table->string('link_regis', 250)->nullable();
            $table->string('room_class', 45)->nullable();
            $table->string('reg_pjawab_hub', 150)->nullable();
            $table->string('reg_pjawab_alamat', 150);
            $table->string('reg_pjawab_nohp', 150);
            $table->enum('reg_ketersidaan_kamar', ['0', '1']);
            $table->string('reg_info_kewajiban', 150);
            $table->string('reg_info_general_consent', 150);
            $table->string('reg_info_carabayar', 150);
            $table->text('ttd_admisi')->nullable();
            $table->text('ttd_gc_hal_dua')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('m_registrasi');
    }
};
