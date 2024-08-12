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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('level_user', 50)->nullable();
            $table->string('name');
            $table->string('username');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('dokter_id')->nullable();
            $table->string('perawat_id')->nullable();
            $table->string('service_room')->nullable();
            $table->integer('is_active')->default(1);
            $table->integer('site')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
        Schema::dropIfExists('users');
    }
};
