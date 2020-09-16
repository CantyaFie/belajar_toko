<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function show(){
        $data_product = Product::all();
    }

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

    public function update($id, Request $request){
        $validator=Validator::make($request->all(),
            ['nama_barang' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'brand' => 'required'
            ]
        );
        if($validator->fails()) {
            return Response()->json($validator->errors());
        }
        $ubah = Product::where('id_product', $id_product)->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'brand' => $request->brand
        ]);
        if($ubah) {
            return Response()->json(['status' => 1]);
        }else {
            return Response()->json(['status' => 0]);
        }
    }
    public function destroy($id_product){
        $hapus = Product::where('id_product',$id_product)->delete();
        if($hapus) {
            return Response()->json(['status' => 1]);
        } else{
            return Response()->json(['status' => 0]);
        }
    }
}
