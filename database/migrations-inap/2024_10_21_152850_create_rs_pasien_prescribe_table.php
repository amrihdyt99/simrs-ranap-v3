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
        Schema::create('rs_pasien_prescribe', function (Blueprint $table) {
            $table->bigIncrements('prescribe_id');
            $table->string('prescribe_reg', 50)->nullable();
            $table->text('prescribe_item')->nullable();
            $table->string('prescribe_method')->nullable();
            $table->integer('prescribe_required')->nullable();
            $table->integer('prescribe_dosage')->nullable();
            $table->string('prescribe_unit')->nullable();
            $table->string('prescribe_frequency')->nullable();
            $table->string('prescribe_duration')->nullable();
            $table->integer('prescribe_qty')->nullable();
            $table->string('prescribe_item_unit')->nullable();
            $table->string('prescribe_route')->nullable();
            $table->integer('prescribe_number')->nullable();
            $table->date('prescribe_date')->nullable();
            $table->time('prescribe_time')->nullable();
            $table->string('prescribe_instruction')->nullable();
            $table->string('prescribe_type')->nullable();
            $table->integer('prescribe_iteration')->nullable();
            $table->text('prescribe_note')->nullable();
            $table->double('prescribe_price', 20, 2)->nullable();
            $table->integer('prescribe_deleted')->nullable()->default(0);
            $table->integer('prescribe_dokter')->nullable();
            $table->string('prescribe_poli')->nullable();
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
        Schema::dropIfExists('rs_pasien_prescribe');
    }
};
