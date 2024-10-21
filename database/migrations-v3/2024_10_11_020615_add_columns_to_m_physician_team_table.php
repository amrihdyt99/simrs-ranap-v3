<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMPhysicianTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_physician_team', function (Blueprint $table) {
            $table->integer('parent_id')->nullable()->after('kategori');
            $table->text('catatan')->nullable()->after('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_physician_team', function (Blueprint $table) {
            //
        });
    }
}
