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
        Schema::create('oxygenation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no')->index('reg_no');
            $table->enum('kategori', ['Modus Ventilasi', 'Mode Ventilasi', 'Tube Type', 'Ventilator']);
            $table->string('jenis');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oxygenation');
    }
};
