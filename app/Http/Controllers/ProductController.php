<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_barang' => 'required',
                'harga' => 'required',
                'stock' => 'required',
                'brand' => 'required'
            ]
        );

        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Product::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'brand' => $request->brand
        ]);

        if($simpan) {
            return Responses()->json(['status'=> 1]);
        }
        else {
            return Responses()->json(['status'=> 0]);
        }
    }
}
