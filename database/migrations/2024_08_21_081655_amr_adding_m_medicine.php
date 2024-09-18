<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmrAddingMMedicine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::connection('mysql2')->table('m_medicine', function (Blueprint $table) {
    //         // Rename the field

    //         $table->string('satuan_dosis')->nullable();
    //         $table->string('satuan_dasar')->nullable();
    //         $table->string('dosis')->nullable();
    //         $table->string('expired_date')->nullable();
    //         $table->text('komposisi')->nullable();

    //         $table->renameColumn('kode', 'item_id');
    //         $table->renameColumn('nama', 'item_name');
    //         $table->renameColumn('harga', 'harga_jual');
    //         $table->renameColumn('stok', 'total');
            
    //         // Change the data type of the field
    //         // $table->string('new_field_name', 255)->change();
    //     });
    // }

    // public function down()
    // {
    //     Schema::connection('mysql2')->table('m_medicine', function (Blueprint $table) {
    //         // Revert the data type change
    //         // $table->integer('new_field_name')->change();

    //         // Revert the field name change
    //         $table->renameColumn('kode', 'item_id');
    //         $table->renameColumn('nama', 'item_name');
    //         $table->renameColumn('harga', 'harga_jual');
    //         $table->renameColumn('stok', 'total');
    //     });
    // }
}
