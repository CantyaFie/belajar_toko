<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id_orders');
            $table->string('nama_pembeli');
            $table->string('nama_barang');
            $table->float('harga');
            $table->integer('jumlah_barang');
            $table->text('alamat');
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_product');

            $table->foreign('id_customer')->references('id_customer')->on('customer');
            $table->foreign('id_product')->references('id_product')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
