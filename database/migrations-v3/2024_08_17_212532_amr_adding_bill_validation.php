<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmrAddingBillValidation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_pasien_billing_validation', function (Blueprint $table) {
            $table->id();
            $table->string('pvalidation_code')->nullable();
            $table->string('pvalidation_reg')->nullable();
            $table->string('pvalidation_total')->nullable();
            $table->longText('pvalidation_detail')->nullable();
            $table->string('pvalidation_user')->nullable();
            $table->integer('pvalidation_status')->default(0);
            $table->longText('pvalidation_selected')->nullable();
            $table->timestamps();
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
