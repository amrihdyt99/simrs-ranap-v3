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
        Schema::create('rekonsiliasi_obat_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('nama_obat');
            $table->string('dosis')->nullable();
            $table->string('frekuensi')->nullable();
            $table->string('cara_beri')->nullable();
            $table->dateTime('waktu_beri_terakhir')->nullable();
            $table->string('tindak_lanjut')->nullable();
            $table->string('aturan_ubah_pakai')->nullable();
            $table->string('created_by', 50)->nullable();
            $table->string('deleted_by', 50)->nullable();
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('rekonsiliasi_obat_item');
    }
};
