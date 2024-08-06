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
        Schema::table('rs_pasien_pemberian_obat', function (Blueprint $table) {

            $table->string('tgl_pemberian_10')->nullable();
            $table->string('rentang_jam_10')->nullable();
            $table->string('tipe_jam_10')->nullable();

            $table->string('tgl_pemberian_11')->nullable();
            $table->string('rentang_jam_11')->nullable();
            $table->string('tipe_jam_11')->nullable();

            $table->string('tgl_pemberian_12')->nullable();
            $table->string('rentang_jam_12')->nullable();
            $table->string('tipe_jam_12')->nullable();

            $table->string('tgl_pemberian_13')->nullable();
            $table->string('rentang_jam_13')->nullable();
            $table->string('tipe_jam_13')->nullable();

            $table->string('tgl_pemberian_14')->nullable();
            $table->string('rentang_jam_14')->nullable();
            $table->string('tipe_jam_14')->nullable();

            $table->string('tgl_pemberian_15')->nullable();
            $table->string('rentang_jam_15')->nullable();
            $table->string('tipe_jam_15')->nullable();

            $table->string('tgl_pemberian_16')->nullable();
            $table->string('rentang_jam_16')->nullable();
            $table->string('tipe_jam_16')->nullable();

            $table->string('tgl_pemberian_17')->nullable();
            $table->string('rentang_jam_17')->nullable();
            $table->string('tipe_jam_17')->nullable();

            $table->string('tgl_pemberian_18')->nullable();
            $table->string('rentang_jam_18')->nullable();
            $table->string('tipe_jam_18')->nullable();


            $table->string('tgl_pemberian_19')->nullable();
            $table->string('rentang_jam_19')->nullable();
            $table->string('tipe_jam_19')->nullable();

            $table->string('tgl_pemberian_20')->nullable();
            $table->string('rentang_jam_20')->nullable();
            $table->string('tipe_jam_20')->nullable();


            $table->string('tgl_pemberian_21')->nullable();
            $table->string('rentang_jam_21')->nullable();
            $table->string('tipe_jam_21')->nullable();

            $table->string('tgl_pemberian_22')->nullable();
            $table->string('rentang_jam_22')->nullable();
            $table->string('tipe_jam_22')->nullable();

            $table->string('tgl_pemberian_23')->nullable();
            $table->string('rentang_jam_23')->nullable();
            $table->string('tipe_jam_23')->nullable();

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
};
