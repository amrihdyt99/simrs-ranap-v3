<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinesspartnerAddressTable extends Migration
{
    private function nama_tabel(){
        return 'businesspartner_address';
    }
    
    public function up()
    {
        Schema::create($this->nama_tabel(), function (Blueprint $table) {
            $table->id();
            $table->bigInteger('businesspartner_id');

            $table->string('GCAddressType');
            $table->string('Line1');
            $table->string('Line2')->nullable();
            $table->string('District')->nullable();
            $table->string('City');
            $table->string('Province');
            $table->string('ZipCode')->nullable();
            $table->string('Country');
            $table->string('PhoneNo1')->nullable();
            $table->string('PhoneNo2')->nullable();
            $table->string('FaxNo1')->nullable();
            $table->string('FaxNo2')->nullable();
            $table->string('Email1')->nullable();
            $table->string('Email2')->nullable();
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
