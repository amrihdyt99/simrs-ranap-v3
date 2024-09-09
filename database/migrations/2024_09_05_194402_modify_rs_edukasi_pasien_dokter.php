<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRsEdukasiPasienDokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_edukasi_pasien_dokter', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('id');;
            $table->text('ttd_dokter')->nullable();
            $table->text('ttd_pasien')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable()->after('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rs_edukasi_pasien_dokter', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('ttd_dokter');
            $table->dropColumn('ttd_pasien');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
