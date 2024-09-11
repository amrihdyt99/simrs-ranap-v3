<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengkajianNoeonatusRekonObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengkajian_noeonatus_rekon_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengkajian_neonatus_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('nama_obat');
            $table->string('dosis')->nullable();
            $table->string('frekuensi')->nullable();
            $table->string('cara_beri')->nullable();
            $table->dateTime('waktu_beri_terakhir')->nullable();
            $table->string('tindak_lanjut')->nullable();
            $table->string('aturan_ubah_pakai')->nullable();
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
        Schema::dropIfExists('pengkajian_noeonatus_rekon_obat');
    }
}
