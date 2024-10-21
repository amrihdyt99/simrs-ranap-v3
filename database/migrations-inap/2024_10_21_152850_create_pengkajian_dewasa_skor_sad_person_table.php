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
        Schema::create('pengkajian_dewasa_skor_sad_person', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no')->nullable();
            $table->string('med_rec')->nullable();
            $table->integer('sex')->nullable();
            $table->integer('age')->nullable();
            $table->integer('depresi')->nullable();
            $table->integer('suicide')->nullable();
            $table->integer('alcohol')->nullable();
            $table->integer('thinking_loss')->nullable();
            $table->integer('separated')->nullable();
            $table->integer('organized_plan')->nullable();
            $table->integer('no_support')->nullable();
            $table->integer('sickness')->nullable();
            $table->integer('skor_sad_person')->nullable();
            $table->string('kategori_sad_person')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('pengkajian_dewasa_skor_sad_person');
    }
};
