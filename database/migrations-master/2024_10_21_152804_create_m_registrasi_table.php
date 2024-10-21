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
            $table->string('reg_lama_igd')->nullable();
            $table->string('reg_status')->nullable();
            $table->string('reg_tgl')->nullable();
            $table->string('reg_jam')->nullable();
            $table->string('reg_poli')->nullable();
            $table->string('reg_dokter')->nullable();
            $table->longText('reg_dokter_care')->nullable();
            $table->longText('reg_perawat_care')->nullable();
            $table->string('reg_ruangan')->nullable();
            $table->string('reg_tipe_kunj')->nullable();
            $table->string('reg_menit')->nullable();
            $table->string('reg_prioritas')->nullable();
            $table->string('reg_cara_bayar')->nullable();
            $table->string('reg_no_dokumen')->nullable();
            $table->string('reg_class')->nullable();
            $table->string('reg_no_kartu')->nullable();
            $table->string('reg_sep_no')->nullable();
            $table->string('reg_referal')->nullable();
            $table->string('reg_diagnosis')->nullable();
            $table->string('reg_corp')->nullable();
            $table->string('reg_pjawab')->nullable();
            $table->string('reg_pjawab_nik')->nullable();
            $table->string('reg_cttn_kunj')->nullable();
            $table->time('reg_datang')->nullable();
            $table->time('reg_pemeriksaan_mulai')->nullable();
            $table->time('reg_pemeriksaan_selesai')->nullable();
            $table->date('reg_selesai')->nullable();
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
            $table->string('charge_class_code')->nullable();
            $table->string('reg_pjawab_hub', 150)->nullable();
            $table->string('reg_pjawab_alamat', 150)->nullable();
            $table->string('reg_pjawab_nohp', 150)->nullable();
            $table->string('reg_ketersidaan_kamar', 1)->nullable();
            $table->string('reg_info_kewajiban', 150)->nullable();
            $table->string('reg_info_general_consent', 150)->nullable();
            $table->string('reg_info_carabayar', 150)->nullable();
            $table->text('ttd_admisi')->nullable();
            $table->text('ttd_gc_hal_dua')->nullable();
            $table->string('purpose', 25)->nullable();
            $table->string('kategori_pasien')->nullable();
            $table->text('reg_cttn')->nullable();
            $table->string('asal_rujukan')->nullable();
            $table->boolean('kasus_polisi')->nullable();
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
