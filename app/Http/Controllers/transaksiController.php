<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function pesan(Request $request)
    {
    	$this->validate($request,[
            'nama' => 'required',
            'jumlah' => 'required',
            'harga' => 'required'
    	]);
 
        pesanan::create([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga
        ]);
        return redirect('/jual');
    
    }
}
