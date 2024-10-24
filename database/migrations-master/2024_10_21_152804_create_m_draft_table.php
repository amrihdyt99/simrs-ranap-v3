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
        Schema::connection('mysql2')->create('m_draft', function (Blueprint $table) {
            $table->bigIncrements('draft_id');
            $table->string('draft_nama')->nullable();
            $table->string('draft_jenis')->nullable();
            $table->string('draft_kategori')->nullable();
            $table->unsignedBigInteger('draft_user')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('m_draft');
    }
};
