<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private function nama_tabel(){
        return 'rs_rujukan_obat_cairan_dibawa';
    }
    
    public function up()
    {
        Schema::create($this->nama_tabel(), function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('kode_surat_rujukan');

            $table->string('item_id');
            $table->string('quantity')->nullable();
            $table->string('item_unit_code')->nullable();
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
};