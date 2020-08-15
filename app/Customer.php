<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $timestamps = false;

    protected $fillable = ['nama_siswa','tanggal_lahir','gender','alamat'];
}