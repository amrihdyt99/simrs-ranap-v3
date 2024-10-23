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
        Schema::connection('mysql2')->create('m_bed', function (Blueprint $table) {
            $table->increments('bed_id');
            $table->string('service_unit_id', 20)->nullable();
            $table->integer('room_id')->nullable();
            $table->string('class_code', 250)->nullable();
            $table->string('bed_code', 250)->nullable();
            $table->string('site_code', 250)->nullable();
            $table->string('registration_no', 250)->nullable();
            $table->string('reservation_no', 250)->nullable();
            $table->string('phone_extension_no', 250)->nullable();
            $table->string('bed_status', 250)->nullable();
            $table->string('gc_type_of_bed', 250)->nullable();
            $table->dateTime('created_date_time')->nullable();
            $table->integer('item_id_automation_charges')->nullable();
            $table->integer('item_id_automation_charge_nurse')->nullable();
            $table->string('is_booked', 250)->nullable();
            $table->string('is_temporary', 250)->nullable();
            $table->string('is_active', 250)->nullable();
            $table->string('is_deleted', 250)->nullable();
            $table->string('last_updated_by', 250)->nullable();
            $table->dateTime('last_updated_datetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('m_bed');
    }
};
