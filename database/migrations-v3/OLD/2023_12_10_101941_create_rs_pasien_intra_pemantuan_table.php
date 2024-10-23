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
        Schema::create('rs_pasien_intra_pemantuan', function (Blueprint $table) {
            $table->integer('id_pemantuan', true);
            $table->string('no_reg', 150);
            $table->string('petugas_id', 150);
            $table->text('tekanan_darah');
            $table->text('nadi');
            $table->text('pernapasan');
            $table->text('spo2');
            $table->text('perubahan_kondisi');
            $table->date('tanggal_simpan');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->text('tanda_tangan')->nullable();
            $table->date('tanggal_ttd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pasien_intra_pemantuan');
    }
};
