<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyNeonatusRekonObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('pengkajian_neonatus_rekon_obat', 'rekonsiliasi_obat_item');


        Schema::table('rekonsiliasi_obat_item', function (Blueprint $table) {
            $table->dropColumn([
                'pengkajian_neonatus_id',
            ]);
        });

        Schema::table('rekonsiliasi_obat_item', function (Blueprint $table) {
            $table->string('created_by', 50)->nullable()->after('aturan_ubah_pakai');
            $table->boolean('is_deleted')->default(0)->after('created_by');
            $table->string('deleted_by', 50)->nullable()->after('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
