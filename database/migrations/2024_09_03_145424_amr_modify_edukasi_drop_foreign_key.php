<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmrModifyEdukasiDropForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_edukasi_pasien', function (Blueprint $table) {
            // Gantilah 'foreign_key_name' dengan nama foreign key yang ingin Anda hapus
            $table->dropColumn('user_id');

            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {}
}
