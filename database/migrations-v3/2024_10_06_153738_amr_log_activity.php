<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmrLogActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('m_log_activity', function (Blueprint $table) {
            $table->id();
            $table->string('log_reg')->nullable();
            $table->string('log_medrec')->nullable();
            $table->string('log_title')->nullable();
            $table->longText('log_desc')->nullable();
            $table->integer('log_user_id')->nullable();
            $table->string('log_user_name')->nullable();
            $table->longText('log_desc_revision')->nullable();
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
        //
    }
}
