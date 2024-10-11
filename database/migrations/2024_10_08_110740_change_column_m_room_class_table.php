<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnMRoomClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_room_class', function (Blueprint $table) {
            $table->dropColumn('IsActive');
            $table->dropColumn('IsDeleted');
            $table->dropColumn('LastUpdatedBy');
        });

        Schema::connection('mysql2')->table('m_room_class', function (Blueprint $table) {
            $table->boolean('IsActive')->nullable();
            $table->boolean('IsDeleted')->default(0);
            $table->string('LastUpdatedBy', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengkajian_neonatus_nyeri', function (Blueprint $table) {});
    }
}
