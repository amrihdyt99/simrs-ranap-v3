<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmrModifyBillingValidation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->table('rs_pasien_billing_validation', function (Blueprint $table) {
            $table->dateTime('pvalidation_cancel_at')->nullable();
            $table->integer('pvalidation_cancel_by')->nullable();
            $table->string('pvalidation_cancel_by_name')->nullable();
            $table->longText('pvalidation_cancel_image')->nullable();
            $table->text('pvalidation_cancel_desc')->nullable();
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
