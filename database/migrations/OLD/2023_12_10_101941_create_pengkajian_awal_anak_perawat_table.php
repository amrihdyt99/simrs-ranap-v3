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
        Schema::create('pengkajian_awal_anak_perawat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('reg_medrec')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('hospitalisasi')->nullable();
            $table->string('jumlah_hospitalisasi')->nullable();
            $table->string('pola_asuh')->nullable();
            $table->string('orang_terdekat')->nullable();
            $table->string('tipe_anak')->nullable();
            $table->string('kebiasaan_perilaku_unik')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('provocating')->nullable();
            $table->string('quality')->nullable();
            $table->string('region')->nullable();
            $table->string('saverity')->nullable();
            $table->string('treatment')->nullable();
            $table->string('understanding')->nullable();
            $table->string('value')->nullable();
            $table->string('face')->nullable();
            $table->string('legs')->nullable();
            $table->string('activity')->nullable();
            $table->string('cry')->nullable();
            $table->string('consolability')->nullable();
            $table->string('onset')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengkajian_awal_anak_perawat');
    }
};
