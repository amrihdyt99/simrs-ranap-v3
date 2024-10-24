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
        Schema::create('rs_pasien_transaksi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kasir_id', 150)->nullable();
            $table->string('nama_kasir', 150)->nullable();
            $table->string('no_faktur', 150)->nullable();
            $table->string('reg_no', 150)->nullable();
            $table->string('tanggungan_asuransi', 20)->nullable();
            $table->string('selisih_bayar', 20)->nullable();
            $table->enum('cara_bayar', ['debit', 'cash', 'kredit'])->nullable();
            $table->string('nomor_kartu', 150)->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->time('jam_bayar')->nullable();
            $table->enum('status_bayar', ['lunas', 'belum lunas'])->nullable();
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
        Schema::dropIfExists('rs_pasien_transaksi');
    }
};
