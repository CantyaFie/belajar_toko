<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function show(){
        return Customer::all();
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_siswa' => 'required',
                'tanggal_lahir' => 'required',
                'gender' => 'required',
                'alamat' => 'required'
            ]
        );

        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Customer::create([
            'nama_siswa' => $request->nama_siswa,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'alamat' => $request->alamat
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
            ['nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required']
        );
        if($validator->fails()) {
            return Response()->json($validator->errors());
        }
        $ubah = Customer::where('id_customer', $id_customer)->update([
            'nama_siswa' => $request->nama_siswa,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'alamat' => $request->alamat
        ]);
        if($ubah) {
            return Response()->json(['status' => 1]);
        }else {
            return Response()->json(['status' => 0]);
        }
    }
    public function destroy($id_customer){
        $hapus = Customer::where('id_customer',$id_customer)->delete();
        if($hapus) {
            return Response()->json(['status' => 1]);
        } else{
            return Response()->json(['status' => 0]);
        }
    }
}
