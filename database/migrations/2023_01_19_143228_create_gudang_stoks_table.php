<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGudangStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->nullable();
            $table->double('stok_awal');
            $table->double('masuk');
            $table->double('harga_masuk');
            $table->double('keluar');
            $table->double('harga_keluar');
            $table->double('stok_akhir');
            $table->integer('jenis')->comment('1=FIFO, 2=LIFO');
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->smallInteger('soft_delete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gudang_stoks');
    }
}
