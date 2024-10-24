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
        Schema::create('icd9cm_bpjs', function (Blueprint $table) {
            $table->string('ID', 20)->nullable();
            $table->string('ID_TIND')->primary();
            $table->string('KET_TINDAKAN')->nullable();
            $table->string('NM_TINDAKAN')->nullable();
            $table->string('PARENT_ID_TIND')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icd9cm_bpjs');
    }
};
