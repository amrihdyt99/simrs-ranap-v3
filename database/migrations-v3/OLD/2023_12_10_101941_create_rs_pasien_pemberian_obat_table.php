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
        Schema::create('rs_pasien_pemberian_obat', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no');
            $table->string('kode_obat', 200)->nullable();
            $table->string('nama_obat', 150)->nullable();
            $table->string('dosis')->nullable();
            $table->string('cara_pemberian')->nullable();
            $table->string('antibiotik')->nullable();
            $table->text('kode_dokter')->nullable();
            $table->string('nama_dokter', 150);
            $table->integer('verifikasi_nurse')->nullable();
            $table->string('tgl_pemberian_0')->nullable();
            $table->string('rentang_jam_0')->nullable();
            $table->string('tipe_jam_0')->nullable();
            $table->string('tgl_pemberian_1')->nullable();
            $table->string('rentang_jam_1')->nullable();
            $table->string('tipe_jam_1')->nullable();
            $table->string('tgl_pemberian_2')->nullable();
            $table->string('rentang_jam_2')->nullable();
            $table->string('tipe_jam_2')->nullable();
            $table->string('tgl_pemberian_3')->nullable();
            $table->string('rentang_jam_3')->nullable();
            $table->string('tipe_jam_3')->nullable();
            $table->string('tgl_pemberian_4')->nullable();
            $table->string('rentang_jam_4')->nullable();
            $table->string('tipe_jam_4')->nullable();
            $table->string('tgl_pemberian_5')->nullable();
            $table->string('rentang_jam_5')->nullable();
            $table->string('tipe_jam_5')->nullable();
            $table->string('tgl_pemberian_6')->nullable();
            $table->string('rentang_jam_6')->nullable();
            $table->string('tipe_jam_6')->nullable();
            $table->string('tgl_pemberian_7')->nullable();
            $table->string('rentang_jam_7')->nullable();
            $table->string('tipe_jam_7')->nullable();
            $table->string('tgl_pemberian_8')->nullable();
            $table->string('rentang_jam_8')->nullable();
            $table->string('tipe_jam_8')->nullable();
            $table->string('tgl_pemberian_9')->nullable();
            $table->string('rentang_jam_9')->nullable();
            $table->string('tipe_jam_9')->nullable();
            $table->timestamps();
            $table->string('frekuensi')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->string('note', 200)->nullable();
            $table->string('tgl_pemberian_10')->nullable();
            $table->string('rentang_jam_10')->nullable();
            $table->string('tipe_jam_10')->nullable();
            $table->string('tgl_pemberian_11')->nullable();
            $table->string('rentang_jam_11')->nullable();
            $table->string('tipe_jam_11')->nullable();
            $table->string('tgl_pemberian_12')->nullable();
            $table->string('rentang_jam_12')->nullable();
            $table->string('tipe_jam_12')->nullable();
            $table->string('tgl_pemberian_13')->nullable();
            $table->string('rentang_jam_13')->nullable();
            $table->string('tipe_jam_13')->nullable();
            $table->string('tgl_pemberian_14')->nullable();
            $table->string('rentang_jam_14')->nullable();
            $table->string('tipe_jam_14')->nullable();
            $table->string('tgl_pemberian_15')->nullable();
            $table->string('rentang_jam_15')->nullable();
            $table->string('tipe_jam_15')->nullable();
            $table->string('tgl_pemberian_16')->nullable();
            $table->string('rentang_jam_16')->nullable();
            $table->string('tipe_jam_16')->nullable();
            $table->string('tgl_pemberian_17')->nullable();
            $table->string('rentang_jam_17')->nullable();
            $table->string('tipe_jam_17')->nullable();
            $table->string('tgl_pemberian_18')->nullable();
            $table->string('rentang_jam_18')->nullable();
            $table->string('tipe_jam_18')->nullable();
            $table->string('tgl_pemberian_19')->nullable();
            $table->string('rentang_jam_19')->nullable();
            $table->string('tipe_jam_19')->nullable();
            $table->string('tgl_pemberian_20')->nullable();
            $table->string('rentang_jam_20')->nullable();
            $table->string('tipe_jam_20')->nullable();
            $table->string('tgl_pemberian_21')->nullable();
            $table->string('rentang_jam_21')->nullable();
            $table->string('tipe_jam_21')->nullable();
            $table->string('tgl_pemberian_22')->nullable();
            $table->string('rentang_jam_22')->nullable();
            $table->string('tipe_jam_22')->nullable();
            $table->string('tgl_pemberian_23')->nullable();
            $table->string('rentang_jam_23')->nullable();
            $table->string('tipe_jam_23')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pasien_pemberian_obat');
    }
};