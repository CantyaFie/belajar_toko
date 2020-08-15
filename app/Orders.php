<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public $timestamps = false;

    protected $fillable = ['nama_pembeli','nama_barang','harga','jumlah_barang','alamat','id_customer','id_product'];
}
