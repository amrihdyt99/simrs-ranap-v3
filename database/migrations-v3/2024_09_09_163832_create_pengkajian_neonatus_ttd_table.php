<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengkajianNeonatusTtdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengkajian_neonatus_ttd', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_neonatus_id');
            $table->tinyInteger('penggunaan_sebelum_admisi')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('med_rec')->nullable();
            $table->text('ttd_dpjp')->nullable();
            $table->dateTime('time_ttd_dpjp')->nullable();
            $table->text('ttd_ppds')->nullable();
            $table->dateTime('time_ttd_ppds')->nullable();
            $table->text('ttd_perawat')->nullable();
            $table->dateTime('time_ttd_perawat')->nullable();
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
        Schema::dropIfExists('pengkajian_neonatus_ttd');
    }
}
