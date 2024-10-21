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
        Schema::create('transfer_internal_diagnostik', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('kode_transfer_internal');
            $table->string('lab')->nullable();
            $table->string('xray')->nullable();
            $table->string('mri')->nullable();
            $table->string('ct_scan')->nullable();
            $table->string('ekg')->nullable();
            $table->string('echo')->nullable();
            $table->tinyInteger('hapus')->default(0);
            $table->timestamp('hapus_at')->nullable();
            $table->string('created_by_username');
            $table->string('deleted_by_username')->nullable();
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
        Schema::dropIfExists('transfer_internal_diagnostik');
    }
};
