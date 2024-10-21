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
        Schema::create('customercontract', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('DocumentNo')->nullable();
            $table->date('DocumentDate')->nullable();
            $table->string('ContractNo');
            $table->string('RevisionNo')->nullable();
            $table->text('ContractSummary');
            $table->date('StartingDate');
            $table->date('EndingDate');
            $table->string('GCCoverageType');
            $table->bigInteger('businesspartner_id');
            $table->string('BusinessPartnerName');
            $table->bigInteger('billto_businesspartner_id');
            $table->string('billto_BusinessPartnerName');
            $table->string('HospitalSigned_id');
            $table->string('HospitalSigned_name');
            $table->bigInteger('CorporateSigned_id');
            $table->string('CorporateSigned_name');
            $table->string('GCCoverAdministrationType');
            $table->decimal('AdministrationFeePercentage', 20, 10);
            $table->integer('IsAdministrationChargesByClass')->default(0);
            $table->decimal('MinAdministration', 20, 10);
            $table->decimal('MaxAdministration', 20, 10);
            $table->string('GCCoverCitoType');
            $table->decimal('CitoPercentage', 20, 10);
            $table->string('GCCoverComplicationType');
            $table->decimal('ComplicationPercentage', 20, 10);
            $table->string('GCCoverCitoComplicationType');
            $table->decimal('CitoComplicationPercentage', 20, 10);
            $table->integer('IsDiscountInCorporateInvoice')->default(0);
            $table->decimal('DiscountCorporateInvoice', 20, 10);
            $table->string('TransactionCode')->nullable();
            $table->string('SiteCode')->nullable();
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
        Schema::dropIfExists('customercontract');
    }
};
