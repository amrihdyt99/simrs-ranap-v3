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
        Schema::connection('mysql2')->create('m_tarif', function (Blueprint $table) {
            $table->bigIncrements('tarif_id');
            $table->string('tarif_item')->nullable();
            $table->string('tarif_kelas', 500)->nullable();
            $table->double('tarif_harga', 20, 2)->nullable();
            $table->char('deleted')->default('0');
            $table->timestamps();
            $table->softDeletes();
            $table->char('created_by')->nullable();
            $table->char('updated_by')->nullable();
            $table->char('deleted_by')->nullable();
            $table->string('tarif_tindakan', 200)->nullable();
            $table->string('tarif_sub_tindakan', 200)->nullable();
            $table->text('sub_harga')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('m_tarif');
    }
};
