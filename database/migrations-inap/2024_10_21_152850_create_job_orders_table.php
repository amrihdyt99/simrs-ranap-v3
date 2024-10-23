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
        Schema::create('job_orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no', 200)->nullable();
            $table->string('order_no', 200)->nullable();
            $table->string('kode_dokter', 200)->nullable();
            $table->string('waktu_order', 200)->nullable();
            $table->string('service_unit', 200)->nullable();
            $table->timestamps();
            $table->string('id_cppt')->nullable();
            $table->integer('dikirim_ke_farmasi')->nullable();
            $table->text('status_kirim')->nullable();
            $table->text('catatan_dokter')->nullable();
            $table->string('bentuk_obat')->nullable();
            $table->string('rute')->nullable();
            $table->integer('obat_pulang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_orders');
    }
};
