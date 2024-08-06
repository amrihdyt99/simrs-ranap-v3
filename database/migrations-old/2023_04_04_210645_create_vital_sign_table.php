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
        Schema::create('vital_sign', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no', 150)->nullable();
            $table->string('kategori', 150)->nullable();
            $table->date('tanggal_pemberian')->nullable();
            $table->string('data', 100)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->time('jam_pemberian');
            $table->string('med_rec', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vital_sign');
    }
};
