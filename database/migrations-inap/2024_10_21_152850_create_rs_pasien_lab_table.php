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
        Schema::create('rs_pasien_lab', function (Blueprint $table) {
            $table->string('plab_kode', 20)->primary();
            $table->string('plab_reg', 20)->nullable();
            $table->string('plab_sequence', 50)->nullable();
            $table->string('plab_tindakan')->nullable();
            $table->string('plab_jenis', 100)->nullable();
            $table->integer('plab_jumlah')->default(1);
            $table->integer('plab_jumlah_diambil')->default(1);
            $table->double('plab_tarif', 20, 2)->default(1);
            $table->text('plab_hasil')->nullable();
            $table->text('plab_file')->nullable();
            $table->dateTime('plab_tgl_hasil')->nullable();
            $table->integer('plab_dokter')->nullable();
            $table->integer('plab_petugas')->nullable();
            $table->string('plab_poli')->nullable();
            $table->integer('plab_deleted')->default(0);
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
        Schema::dropIfExists('rs_pasien_lab');
    }
};
