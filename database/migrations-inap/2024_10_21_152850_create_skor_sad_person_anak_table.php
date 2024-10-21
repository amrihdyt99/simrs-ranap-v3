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
        Schema::create('skor_sad_person_anak', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->tinyInteger('sex')->nullable();
            $table->tinyInteger('age')->nullable();
            $table->tinyInteger('depresi')->nullable();
            $table->tinyInteger('suicide')->nullable();
            $table->tinyInteger('alcohol')->nullable();
            $table->tinyInteger('thinking_loss')->nullable();
            $table->tinyInteger('separated')->nullable();
            $table->tinyInteger('organized_plan')->nullable();
            $table->tinyInteger('no_social_support')->nullable();
            $table->tinyInteger('sickness')->nullable();
            $table->integer('skor_sad_person')->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
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
        Schema::dropIfExists('skor_sad_person_anak');
    }
};
