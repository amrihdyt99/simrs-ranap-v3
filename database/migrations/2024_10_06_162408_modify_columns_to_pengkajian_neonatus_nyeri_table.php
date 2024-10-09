<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsToPengkajianNeonatusNyeriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengkajian_neonatus_nyeri', function (Blueprint $table) {
            $table->dropColumn('skala_nips');
        });
        
        Schema::table('pengkajian_neonatus_nyeri', function (Blueprint $table) {
            $table->string('skala_nips')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengkajian_neonatus_nyeri', function (Blueprint $table) {
            //
        });
    }
}
