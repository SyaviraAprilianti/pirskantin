<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\minuman;
use PDF;

class minumanController extends Controller
{
    public function minum(){
        // ambil semua data
            $minuman = minuman::all();
            
                return view('admin.minuman' ,['minuman'=>$minuman]);
            }

            public function userminum(){
                // ambil semua data
                    $minuman = minuman::all();
                    
                    return view('user.userminum' ,['minum'=>$minuman]);
                    }
    
            public function delete($id){
                $minuman = minuman::find($id);
                $minuman->delete();
                return redirect('/minum');
      
              }

              public function tambahminum(request $request){

                $this->validate($request,[
                  'nama' => 'required',
                  'harga' => 'required',
                  'stok' => 'required',
                  'deskripsi' => 'required',
                  'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        
                ]);
                    
                $image = $request->file('gambar');
                $name_file = $image->getClientOriginalName();
                $image->move(base_path('/public/imagedb'), $name_file);

                $mim = new minuman;
        
                $mim->nama = $request->input('nama');
                $mim->harga = $request->input('harga');
                $mim->stok= $request->input('stok');
                $mim->deskripsi = $request->input('deskripsi');
                $mim->gambar= $name_file;
                
                $mim->save();
        
                return redirect('/minum');
        
                }

                
      public function editminum($id){
        $minuman = minuman::find($id);
        return view('admin.editminum', ['minuman' => $minuman]);
    }

    public function updateminum($id, Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
           
        ]);
    
        $minuman = minuman::find($id);
        $minuman->nama = $request->nama;
        $minuman->harga= $request->harga;
        $minuman->stok = $request->stok;
        $minuman->deskripsi = $request->deskripsi;
        $minuman->gambar = $request->gambar;
       
        $minuman->save();
 
     return redirect('/minum');
    }
    public function cetak_pdfmin()
    {
	$minuman = minuman::all();
	$pdfnya = PDF::loadview('admin.minum_pdf',['minuman'=>$minuman]);
	return $pdfnya->download('minum_pdf.pdf');
    }
      
}