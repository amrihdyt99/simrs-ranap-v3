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
        Schema::connection('mysql2')->create('rs_m_role', function (Blueprint $table) {
            $table->bigIncrements('role_id');
            $table->string('role_name')->nullable();
            $table->tinyInteger('role_deleted')->nullable();
            $table->integer('role_deleted_at')->nullable();
            $table->unsignedBigInteger('role_deleted_by')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('rs_m_role');
    }
};
