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
        Schema::create('rs_pasien_billing', function (Blueprint $table) {
            $table->bigIncrements('pbill_id');
            $table->string('pbill_reg', 20)->nullable();
            $table->string('pbill_item', 20)->nullable();
            $table->integer('pbill_dispense_qty')->nullable();
            $table->integer('pbill_charges_qty')->nullable();
            $table->double('pbill_charges_price', 8, 2)->nullable();
            $table->string('pbill_asset')->nullable();
            $table->integer('pbill_deleted')->default(0);
            $table->integer('pbill_dokter');
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
        Schema::dropIfExists('rs_pasien_billing');
    }
};
