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
        Schema::create('pengkajian_obgyn_data_psikologis', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_obgyn_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->text('status_emosional')->nullable();
            $table->string('status_emosional_text')->nullable();
            $table->string('merokok')->nullable();
            $table->string('frekuensi_merokok')->nullable();
            $table->string('minuman_alkohol')->nullable();
            $table->string('riwayat_gangguan_jiwa')->nullable();
            $table->integer('sex')->nullable();
            $table->integer('age')->nullable();
            $table->integer('depresi')->nullable();
            $table->integer('suicide')->nullable();
            $table->integer('alcohol')->nullable();
            $table->integer('thinking_loss')->nullable();
            $table->integer('separated')->nullable();
            $table->integer('organized_plan')->nullable();
            $table->integer('no_support')->nullable();
            $table->integer('sickness')->nullable();
            $table->integer('skor_sad_person')->nullable();
            $table->string('kategori_sad_person')->nullable();
            $table->string('riwayat_bunuh_diri')->nullable();
            $table->string('riwayat_bunuh_diri_text')->nullable();
            $table->string('riwayat_trauma_psikis')->nullable();
            $table->string('riwayat_trauma_psikis_detail')->nullable();
            $table->string('riwayat_trauma_psikis_detail_kriminal_text')->nullable();
            $table->string('riwayat_trauma_psikis_detail_lain_text')->nullable();
            $table->string('hambatan_sosial_ekonomi')->nullable();
            $table->string('konseling_spiritual')->nullable();
            $table->string('konseling_spiritual_text')->nullable();
            $table->string('bantuan_ibadah')->nullable();
            $table->string('bantuan_ibadah_text')->nullable();
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
        Schema::dropIfExists('pengkajian_obgyn_data_psikologis');
    }
};
