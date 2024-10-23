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
        Schema::create('job_orders_dt', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no', 200)->nullable();
            $table->string('order_no', 200)->nullable();
            $table->string('item_code', 200)->nullable();
            $table->string('jenis_order', 150);
            $table->string('item_name', 200);
            $table->integer('qty')->nullable();
            $table->string('flag', 200)->nullable();
            $table->string('temp_flag', 10)->nullable();
            $table->integer('temp_flag_racikan')->nullable();
            $table->string('dosis', 100)->nullable();
            $table->string('hari', 200)->nullable();
            $table->string('durasi_hari', 200)->nullable();
            $table->integer('harga_jual')->nullable();
            $table->string('ket_dosis', 200)->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->string('id_cppt')->nullable();
            $table->string('dosis_kode')->nullable();
            $table->string('bentuk_obat')->nullable();
            $table->string('rute')->nullable();
            $table->integer('flag_racikan')->nullable();
            $table->text('catatan_dokter')->nullable();
            $table->string('dokter_order', 11)->nullable();
            $table->integer('deleted')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->text('deleted_requester')->nullable();
            $table->text('deleted_reason')->nullable();
            $table->float('harga_awal', 10, 0)->nullable();
            $table->text('instruksi_khusus')->nullable();
            $table->integer('jumlah_perhari')->nullable();
            $table->integer('obat_pulang')->nullable();
            $table->integer('created_by_id')->nullable();
            $table->string('created_by_name')->nullable();
            $table->integer('non_bpjs')->default(0);
            $table->boolean('flag_billing_perawat')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_orders_dt');
    }
};
