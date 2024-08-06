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
        Schema::create('rs_pasien_soaper', function (Blueprint $table) {
            $table->bigIncrements('soaper_id');
            $table->string('soaper_reg')->nullable();
            $table->text('soaper_subject')->nullable();
            $table->text('soaper_object')->nullable();
            $table->text('soaper_assesment')->nullable();
            $table->text('soaper_planning')->nullable();
            $table->integer('soaper_deleted')->default(0);
            $table->integer('soaper_perawat')->nullable();
            $table->string('soaper_poli', 20)->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->string('nama_ppa', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pasien_soaper');
    }
};
