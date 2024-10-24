<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FinChangeTransferInternalColumSecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('transfer_internal', function (Blueprint $table) {
        //     $table->dropColumn([
        //         'ditransfer_oleh_user_id',
        //         'diterima_oleh_user_id'
        //     ]);
        // });

        Schema::table('transfer_internal', function (Blueprint $table) {
            $table->string('ditransfer_oleh_user_id', 50)->nullable();
            $table->string('diterima_oleh_user_id', 50)->nullable();
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
