<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('produk_id');
            $table->integer('pelanggan_id');
            $table->string('invoice_id');
            $table->integer('qty');
            $table->integer('total_harga');
            $table->enum('status', ['Belum dibayar', 'Dibayar', 'Dikirim', 'Diterima', 'Dibatalkan']);
            $table->date('date');
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
        Schema::dropIfExists('pesanan');
    }
}
