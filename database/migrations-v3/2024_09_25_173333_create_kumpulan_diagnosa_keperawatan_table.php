<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKumpulanDiagnosaKeperawatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('m_daftar_diagnosa_keperawatan', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10);
            $table->string('diagnosa_keperawatan', 50);
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
        Schema::dropIfExists('m_daftar_diagnosa_keperawatan');
    }
}
