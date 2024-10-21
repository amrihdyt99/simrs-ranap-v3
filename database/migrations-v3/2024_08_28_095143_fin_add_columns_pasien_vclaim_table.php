<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FinAddColumnsPasienVclaimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_pasien_vclaim', function (Blueprint $table) {
            $table->string('created_by')->after('business_partner_id');
            $table->string('updated_by')->nullable()->after('created_by');
            $table->boolean('is_deleted')->nullable()->after('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_pasien_vclaim', function (Blueprint $table) {
            //
        });
    }
}
