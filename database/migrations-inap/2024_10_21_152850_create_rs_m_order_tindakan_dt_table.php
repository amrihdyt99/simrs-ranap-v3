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
        Schema::create('rs_m_order_tindakan_dt', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode_order', 200)->nullable();
            $table->string('kode_tindakan', 200)->nullable();
            $table->string('nama_tindakan', 200)->nullable();
            $table->string('jenis_tindakan', 100)->nullable();
            $table->string('harga', 25)->nullable();
            $table->string('status_tindakan', 2)->nullable();
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
        Schema::dropIfExists('rs_m_order_tindakan_dt');
    }
};
