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
        Schema::create('rm16', function (Blueprint $table) {
            $table->integer('id');
            $table->string('MedicalNo', 20);
            $table->text('satu');
            $table->text('dua');
            $table->text('tiga');
            $table->text('empat');
            $table->text('lima');
            $table->string('file', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rm16');
    }
};
