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
        Schema::create('skrining_gizi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_medrec');
            $table->string('reg_no');
            $table->string('turun_berat_badan');
            $table->string('turun_nafsu_makan');
            $table->string('ketegori');
            $table->string('catatan');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skrining_gizi');
    }
};
