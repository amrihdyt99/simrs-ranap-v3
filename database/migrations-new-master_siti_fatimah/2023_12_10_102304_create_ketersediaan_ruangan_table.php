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
        Schema::connection('mysql2')->create('ketersediaan_ruangan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('id_paviliun', 100)->nullable();
            $table->string('nama_pavilun', 100)->nullable();
            $table->string('room_code', 100)->nullable();
            $table->string('nama_ruangan', 100)->nullable();
            $table->string('nomor_bed', 100)->nullable();
            $table->string('status_ketersediaan', 2)->nullable();
            $table->string('id_kelas', 2)->nullable();
            $table->string('nama_kelas', 50)->nullable();
            $table->string('harga_perhari', 25)->nullable();
            $table->enum('is_temporary', ['0', '1'])->nullable()->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('ketersediaan_ruangan');
    }
};
