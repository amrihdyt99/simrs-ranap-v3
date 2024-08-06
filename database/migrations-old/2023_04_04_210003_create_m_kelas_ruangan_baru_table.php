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
        Schema::connection('mysql2')->create('m_kelas_ruangan_baru', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama_kelas', 200)->nullable();
            $table->integer('tarif_kelas')->nullable();
            $table->enum('is_active', ['0', '1'])->nullable()->default('1');
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
        Schema::connection('mysql2')->dropIfExists('m_kelas_ruangan_baru');
    }
};
