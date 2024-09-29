<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmrAddDischargeOpen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_pasien_discharge_open', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('requester')->nullable();
            $table->text('reason')->nullable();
            $table->string('status')->nullable();
            $table->integer('is_open')->default(0);
            $table->string('open_by')->nullable();
            $table->dateTime('open_at')->nullable();
            $table->text('open_text')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
