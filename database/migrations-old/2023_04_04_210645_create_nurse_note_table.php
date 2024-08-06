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
        Schema::create('nurse_note', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no', 150);
            $table->string('med_rec', 150);
            $table->string('id_nurse', 150)->nullable();
            $table->text('catatan')->nullable();
            $table->date('tgl_note')->nullable();
            $table->time('jam_note');
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
        Schema::dropIfExists('nurse_note');
    }
};
