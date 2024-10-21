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
        Schema::create('case_manager_akumulasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('tgl_akumulasi')->nullable();
            $table->string('pelaksanaan')->nullable();
            $table->string('hasil')->nullable();
            $table->string('terminasi')->nullable();
            $table->string('tgl_ttd')->nullable();
            $table->text('ttd_perawat')->nullable();
            $table->string('perawat_name')->nullable();
            $table->text('ttd_pasien')->nullable();
            $table->string('pasien_name')->nullable();
            $table->text('ttd_saksi')->nullable();
            $table->string('saksi_name')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('case_manager_akumulasi');
    }
};
