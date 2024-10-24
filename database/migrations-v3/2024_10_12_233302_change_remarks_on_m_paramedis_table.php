<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRemarksOnMParamedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_paramedis', function (Blueprint $table) {
            $table->dropColumn([
                'Remarks',
            ]);
        });

        Schema::connection('mysql2')->table('m_paramedis', function (Blueprint $table) {
            $table->text('Remarks')->nullable()->after('UserName');
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
