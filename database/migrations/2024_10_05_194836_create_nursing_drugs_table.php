<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursingDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('nursing_drugs', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('kode_obat', 100)->nullable();
            $table->string('nama_obat')->nullable();
            $table->date('tgl_pemberian', 100)->nullable();
            $table->string('cara_pemberian', 100)->nullable();
            $table->string('antibiotik', 100)->nullable();
            $table->string('frekuensi')->nullable();
            $table->string('dosis')->nullable();
            $table->string('nama_dokter')->nullable();
            $table->string('kode_dokter', 100)->nullable();
            $table->text('waktu_pemberian')->nullable();
            $table->string('shift', 100)->nullable();
            $table->string('created_by_name')->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('deleted_by', 100)->nullable();
            $table->string('deleted_by_name')->nullable();
            $table->boolean('is_deleted')->default(0);
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
}
