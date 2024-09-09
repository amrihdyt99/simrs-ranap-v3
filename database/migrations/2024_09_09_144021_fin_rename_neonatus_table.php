<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FinRenameNeonatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('pengkajian_noeonatus_fisik', 'pengkajian_neonatus_fisik');
        Schema::rename('pengkajian_noeonatus_nyeri', 'pengkajian_neonatus_nyeri');
        Schema::rename('pengkajian_noeonatus_rekon_obat', 'pengkajian_neonatus_rekon_obat');
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
