<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FinAddColumnTransferInternalDiagnostikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->table('transfer_internal_diagnostik', function (Blueprint $table) {
            $table->tinyInteger('hapus')->default(0)->after('echo');
            $table->timestamp('hapus_at')->nullable()->after('hapus');
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
