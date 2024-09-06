<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInRegistrationCancelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registration_cancelations', function (Blueprint $table) {
            $table->string('medrec_no')->nullable()->after('reg_no');
            $table->string('patient_name')->nullable()->after('medrec_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registration_cancelations', function (Blueprint $table) {
            //
        });
    }
}
