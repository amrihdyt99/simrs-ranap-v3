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
        Schema::create('rs_m_order_tindakan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode_order', 200)->nullable();
            $table->string('dokter_order', 10)->nullable();
            $table->string('reg_no', 25)->nullable();
            $table->date('tanggal_order')->nullable();
            $table->time('waktu_order')->nullable();
            $table->string('med_rec', 25)->nullable();
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
        Schema::dropIfExists('rs_m_order_tindakan');
    }
};
