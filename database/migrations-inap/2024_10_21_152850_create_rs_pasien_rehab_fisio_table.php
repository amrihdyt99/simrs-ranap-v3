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
        Schema::create('rs_pasien_rehab_fisio', function (Blueprint $table) {
            $table->bigIncrements('fisio_id');
            $table->string('fisio_reg', 20)->nullable();
            $table->mediumText('fisio_check')->nullable();
            $table->integer('fisio_fisioterapis')->nullable();
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
        Schema::dropIfExists('rs_pasien_rehab_fisio');
    }
};
