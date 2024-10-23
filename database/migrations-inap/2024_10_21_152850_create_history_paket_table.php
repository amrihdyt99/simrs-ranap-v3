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
        Schema::create('history_paket', function (Blueprint $table) {
            $table->string('no_reg', 200)->primary();
            $table->string('item_code', 200)->nullable();
            $table->string('item_name', 200)->nullable();
            $table->string('price', 200)->nullable();
            $table->text('rincian_paket')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_paket');
    }
};
