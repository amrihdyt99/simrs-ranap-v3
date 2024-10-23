<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResikoJatuhHumptyDumptyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resiko_jatuh_humpty_dumpty', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->unsignedBigInteger('user_id');
            $table->integer('humpty_dumpty_umur');
            $table->integer('humpty_dumpty_jenis_kelamin');
            $table->integer('humpty_dumpty_diagnosis');
            $table->integer('humpty_dumpty_gangguan_kognitif');
            $table->integer('humpty_dumpty_faktor_lingkungan');
            $table->integer('humpty_dumpty_respon_terhadap_anastesi');
            $table->integer('humpty_dumpty_gangguan_obat');
            $table->integer('total_skor_humpty_dumpty');
            $table->string('kategori_humpty_dumpty');
            $table->text('intervensi_resiko_jatuh_humpty_dumpty_rendah');
            $table->text('intervensi_resiko_jatuh_humpty_dumpty_tinggi');
            $table->string('shift');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resiko_jatuh_humpty_dumpty');
    }
}
