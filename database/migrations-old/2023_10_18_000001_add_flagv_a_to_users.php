<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlagvAToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')
        ->table('users', function (Blueprint $table) {

            $table->string('user_active_by')->nullable();
            $table->dateTime('user_active_at')->nullable();
            
            $table->integer('is_deleted')->default(0);
            $table->string('user_deleted_by')->nullable();
            $table->dateTime('user_deleted_at')->nullable();

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
