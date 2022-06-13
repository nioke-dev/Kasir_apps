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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama_barang');
            $table->integer('kategori_id');
            $table->integer('stok_toko')->nullable();
            $table->integer('stok_gudang')->nullable();
            $table->integer('profit');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('harga_jual_terakhir');
            $table->date('tanggal');
            $table->string('operator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
};
