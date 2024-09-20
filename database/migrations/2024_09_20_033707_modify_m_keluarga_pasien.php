<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMKeluargaPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_keluarga_pasien', function (Blueprint $table) {
            $table->dropColumn([
                'Job',
                'Address',
                'PhoneNo',
                'MobilePhoneNo',
                'GCRelationShip',
                'SSN',
                'Picture',
                'IsEmergencyContact'
            ]);
        });
        Schema::connection('mysql2')->table('m_keluarga_pasien', function (Blueprint $table) {
            $table->string('Job', 255)->nullable()->change();
            $table->string('Address', 255)->nullable()->change();
            $table->string('PhoneNo', 20)->nullable()->change();
            $table->string('MobilePhoneNo', 20)->nullable()->change();
            $table->string('GCRelationShip', 100)->nullable()->change();
            $table->string('SSN', 50)->nullable()->change();
            $table->string('Picture', 255)->nullable()->change();
            $table->boolean('IsEmergencyContact')->nullable()->default(false)->change();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_keluarga_pasien', function (Blueprint $table) {
            //
        });
    }
}
