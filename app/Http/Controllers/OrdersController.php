<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_pembeli' => 'required',
                'nama_barang' => 'required',
                'harga' => 'required',
                'jumlah_barang' => 'required',
                'alamat' => 'required',
                'id_customer' => 'required',
                'id_product' => 'required'
            ]
        );

        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Orders::create([
            'nama_pembeli' => $request->nama_pembeli,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'jumlah_barang' => $request->jumlah_barang,
            'alamat' => $request->alamat,
            'id_customer' => $request->id_customer,
            'id_product' => $request->id_product
        ]);

        if($simpan)
        {
            return Response()->json(['status' => 1]);
        }
        else
        {
            return Response()->json(['status' => 0]);
        }
    } 
}
