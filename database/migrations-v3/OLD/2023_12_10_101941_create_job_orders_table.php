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
