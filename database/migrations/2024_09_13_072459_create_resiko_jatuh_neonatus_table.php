<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResikoJatuhNeonatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resiko_jatuh_neonatus', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->unsignedBigInteger('user_id');
            $table->text('internvensi_tidak_beresiko_neonatus');
            $table->text('edukasi');
            $table->text('evaluasi');
            $table->dateTime('tgl_ttd_keluarga');
            $table->text('ttd_keluarga');
            $table->dateTime('tgl_ttd_petugas');
            $table->text('ttd_petugas');
            $table->string('shift');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resiko_jatuh_neonatus');
    }
}
