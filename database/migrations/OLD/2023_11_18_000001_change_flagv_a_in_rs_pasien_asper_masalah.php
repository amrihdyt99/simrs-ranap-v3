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
        Schema::table('rs_pasien_asper_masalah', function (Blueprint $table) {
            $table->text('pmasalah_masalah')->change();
            $table->text('pmasalah_perawat')->change();
            $table->string('pmasalah_medrec');
            $table->text('pintervensi_intervensi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
