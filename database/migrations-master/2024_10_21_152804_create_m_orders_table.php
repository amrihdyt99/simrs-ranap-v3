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
        Schema::connection('mysql2')->create('m_orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode_order', 150)->nullable();
            $table->enum('kategori', ['laboratorium', 'radiologi', 'fisioterapy'])->nullable();
            $table->string('user_order', 200)->nullable();
            $table->string('reg_user', 150)->nullable();
            $table->string('med_rec', 100)->nullable();
            $table->string('status_order', 1)->nullable();
            $table->date('tanggal_order')->nullable();
            $table->time('waktu_order')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('m_orders');
    }
};
