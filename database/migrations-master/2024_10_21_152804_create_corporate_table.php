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
        Schema::connection('mysql2')->create('corporate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('businesspartner_id');
            $table->string('BusinessPartnerName');
            $table->string('GCInsuranceType')->nullable();
            $table->string('GCCustomerType');
            $table->decimal('CreditLimit', 20, 10);
            $table->decimal('CreditBalance', 20, 10);
            $table->integer('IsBlackList')->default(0);
            $table->string('BlackListReason')->nullable();
            $table->string('Remarks')->nullable();
            $table->integer('aktif')->default(1);
            $table->timestamp('aktif_at')->useCurrent();
            $table->string('aktif_by_user_name')->nullable();
            $table->integer('hapus')->default(0);
            $table->timestamp('hapus_at')->nullable();
            $table->string('hapus_by_user_name')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by_user_name')->nullable();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
            $table->string('updated_by_user_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('corporate');
    }
};
