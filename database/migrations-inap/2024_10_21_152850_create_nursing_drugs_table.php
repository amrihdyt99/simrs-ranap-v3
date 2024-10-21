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
        Schema::create('nursing_drugs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->text('item_obat')->nullable();
            $table->date('tgl_pemberian')->nullable();
            $table->string('cara_pemberian', 100)->nullable();
            $table->string('antibiotik', 100)->nullable();
            $table->string('nama_dokter')->nullable();
            $table->string('kode_dokter', 100)->nullable();
            $table->text('waktu_pemberian')->nullable();
            $table->string('shift', 100)->nullable();
            $table->string('created_by_name')->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('deleted_by', 100)->nullable();
            $table->string('deleted_by_name')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('nursing_drugs');
    }
};
