<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAktualOnMonitoringNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monitoring_news', function (Blueprint $table) {
            $table->string('aktual_pernafasaan')->nullable()->after('user_id');
            $table->string('aktual_saturasi_oksigen')->nullable()->after('aktual_pernafasaan');
            $table->string('aktual_suhu')->nullable()->after('o2_tambahan');
            $table->string('aktual_tekanan_darah')->nullable()->after('suhu');
            $table->string('aktual_nadi')->nullable()->after('tekanan_darah');
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
