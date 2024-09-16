<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToRsPasienDischargeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_pasien_discharge', function (Blueprint $table) {
            $table->date('pdischarge_tgl')->nullable()->after('pdischarge_dokter');
            $table->time('pdischarge_jam')->nullable()->after('pdischarge_tgl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rs_pasien_discharge', function (Blueprint $table) {
            $table->dropColumn('pdischarge_tgl'); // Menghapus kolom pdischarge_tgl
            $table->dropColumn('pdischarge_jam'); // Menghapus kolom pdischarge_time
        });
    }
}
