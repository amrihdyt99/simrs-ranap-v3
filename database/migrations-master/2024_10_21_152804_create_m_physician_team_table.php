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
        Schema::connection('mysql2')->create('m_physician_team', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no', 150)->nullable();
            $table->string('kode_dokter', 50)->nullable();
            $table->string('kategori', 20)->nullable();
            $table->integer('parent_id')->nullable();
            $table->text('catatan')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('m_physician_team');
    }
};
