<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AmrModifySoapdok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE rs_pasien_cppt MODIFY bertindak_sebagai TEXT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // If you need to revert the changes, adjust as necessary
        DB::statement('ALTER TABLE rs_pasien_cppt MODIFY bertindak_sebagai TEXT');
    }
}
