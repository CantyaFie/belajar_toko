<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
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
}
