<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMRegistrasiPjTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('m_registrasi_pj', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('reg_pjawab_nama');
            $table->string('reg_hub_pasien');
            $table->string('reg_pjawab_nohp')->nullable();
            $table->string('reg_pjawab_nik')->nullable();
            $table->string('reg_pjawab_bayar')->nullable();
            $table->string('reg_pjawab_alamat')->nullable();

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
        Schema::dropIfExists('m_registrasi_pj');
    }
}
