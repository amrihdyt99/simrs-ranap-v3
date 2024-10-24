<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_pasien_billing_validation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pvalidation_code')->nullable();
            $table->string('pvalidation_reg')->nullable();
            $table->string('pvalidation_total')->nullable();
            $table->longText('pvalidation_detail')->nullable();
            $table->string('pvalidation_user')->nullable();
            $table->integer('pvalidation_status')->default(0);
            $table->longText('pvalidation_selected')->nullable();
            $table->timestamps();
            $table->dateTime('pvalidation_cancel_at')->nullable();
            $table->integer('pvalidation_cancel_by')->nullable();
            $table->string('pvalidation_cancel_by_name')->nullable();
            $table->longText('pvalidation_cancel_image')->nullable();
            $table->text('pvalidation_cancel_desc')->nullable();
            $table->integer('non_bpjs')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pasien_billing_validation');
    }
};
