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
        Schema::connection('mysql2')->create('m_clinical_pathway', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode_path')->unique('kode_path_UNIQUE');
            $table->string('nama_path');
            $table->string('username', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('m_clinical_pathway');
    }
};
