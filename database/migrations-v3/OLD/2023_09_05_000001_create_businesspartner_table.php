<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinesspartnerTable extends Migration
{
    private function nama_tabel(){
        return 'businesspartner';
    }
    
    public function up()
    {
        Schema::create($this->nama_tabel(), function (Blueprint $table) {
            $table->id();
            $table->string('BusinessPartnerCode');
            $table->string('BusinessPartnerName');
            $table->string('ShortName')->nullable();
            $table->string('Initial')->nullable();
            $table->integer('BusinessPartnerType')->nullable();
            $table->string('ContactPerson1Name')->nullable();
            $table->string('ContactPerson1PhoneNo')->nullable();
            $table->string('ContactPerson2Name')->nullable();
            $table->string('ContactPerson2PhoneNo')->nullable();
            $table->integer('IsTaxRegistrant')->nullable();
            $table->string('TaxRegistrantNo')->nullable();
            $table->string('TermCode')->nullable();
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
