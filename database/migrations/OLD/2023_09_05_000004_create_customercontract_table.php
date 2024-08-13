<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomercontractTable extends Migration
{
    private function nama_tabel(){
        return 'customercontract';
    }
    
    public function up()
    {
        Schema::create($this->nama_tabel(), function (Blueprint $table) {
            $table->id();

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
            $table->decimal('AdministrationFeePercentage', $precision = 20, $scale = 10);
            $table->integer('IsAdministrationChargesByClass')->default(0);
            $table->decimal('MinAdministration', $precision = 20, $scale = 10);
            $table->decimal('MaxAdministration', $precision = 20, $scale = 10);

            $table->string('GCCoverCitoType');
            $table->decimal('CitoPercentage', $precision = 20, $scale = 10);

            $table->string('GCCoverComplicationType');
            $table->decimal('ComplicationPercentage', $precision = 20, $scale = 10);

            $table->string('GCCoverCitoComplicationType');
            $table->decimal('CitoComplicationPercentage', $precision = 20, $scale = 10);

            $table->integer('IsDiscountInCorporateInvoice')->default(0);
            $table->decimal('DiscountCorporateInvoice', $precision = 20, $scale = 10);

            /*

            // unknown / tidak diketahui
            TransactionCode = contoh 80,86,169,173,176,dsb
            SiteCode
            ================================

            DocumentNo
            DocumentDate

            ContractNo
            RevisionNo
            ContractSummary
            StartingDate
            EndingDate

            GCCoverageType
            BusinessPartnerID
            BillToBusinessPartnerID
            HospitalSigned
            CorporateSigned

            GCCoverAdministrationType
            AdministrationFeePercentage
            IsAdministrationChargesByClass
            MinAdministration
            MaxAdministration

            GCCoverCitoType
            CitoPercentage

            GCCoverComplicationType
            ComplicationPercentage

            GCCoverCitoComplicationType
            CitoComplicationPercentage

            IsDiscountInCorporateInvoice
            DiscountCorporateInvoice

            */
            
            $table->string('TransactionCode')->nullable();
            $table->string('SiteCode')->nullable();
            $table->string('Remarks')->nullable(); // Catatan
        });
        $this->nyaa(); //wajib
    }

    public function down()
    {
        Schema::dropIfExists($this->nama_tabel());
    }

    private function nyaa(){
        Schema::table($this->nama_tabel(), function(Blueprint $table)
        {
            $table->integer('aktif')->default(1);
            $table->timestamp('aktif_at')->useCurrent();
            $table->string('aktif_by_user_name')->nullable();

            $table->integer('hapus')->default(0);
            $table->timestamp('hapus_at')->nullable();
            $table->string('hapus_by_user_name')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by_user_name')->nullable();

            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->string('updated_by_user_name')->nullable();
        });
    }
}
