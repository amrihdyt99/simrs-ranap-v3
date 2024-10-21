<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRekonsiliasiObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rekonsiliasi_obat', function (Blueprint $table) {
            $table->string('farmasi_username', 50)->nullable()->after('time_ttd_dpjp');
            $table->string('perawat_username', 50)->nullable()->after('time_ttd_perawat');
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
}
