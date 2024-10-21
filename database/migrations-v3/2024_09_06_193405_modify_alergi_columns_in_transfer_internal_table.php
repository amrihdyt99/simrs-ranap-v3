<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAlergiColumnsInTransferInternalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transfer_internal', function (Blueprint $table) {
            $table->text('transfer_alergi_text')->nullable()->after('transfer_alergi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transfer_internal', function (Blueprint $table) {
            $table->dropColumn('transfer_alergi_text');
        });
    }
}
