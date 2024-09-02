<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddSignatureToRsPasienResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_pasien_resume', function (Blueprint $table) {
            $table->text('ttd_dokter')->nullable();
            $table->text('ttd_pasien')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */    public function down()
    {
        Schema::table('rs_pasien_resume', function (Blueprint $table) {
            $table->dropColumn('ttd_dokter');
            $table->dropColumn('ttd_pasien');
        });
    }
}
