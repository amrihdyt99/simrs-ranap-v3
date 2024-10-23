<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AmrModifyRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection('mysql2')->statement('ALTER TABLE m_registrasi MODIFY reg_dokter_care LONGTEXT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // If you need to revert the changes, adjust as necessary
        DB::connection('mysql2')->statement('ALTER TABLE m_registrasi MODIFY reg_dokter_care LONGTEXT');
    }
}
