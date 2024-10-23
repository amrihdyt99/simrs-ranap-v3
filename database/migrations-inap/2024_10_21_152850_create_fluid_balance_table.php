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
        Schema::create('fluid_balance', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no')->index('no_reg');
            $table->enum('intake', ['transfusi', 'makan', 'parental', 'komulatif', 'output', 'fluid_balance']);
            $table->string('jenis');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->string('med_rec', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fluid_balance');
    }
};
