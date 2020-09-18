<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\makanan;
use PDF;

class MakananController extends Controller
{
  public function maem(){
    // ambil semua data
        $makanan = makanan::all();
        
            return view('admin.makanan' ,['makanan'=>$makanan]);
        }

        public function usermaem(){
          // ambil semua data
              $makanan = makanan::all();
              
                  return view('user.usermakanan' ,['makanan'=>$makanan]);
              }
      
        public function deletemkn($id){
          $makanan = makanan::find($id);
          $makanan->delete();
          return redirect('/makann');

        }

      //   public function tambahmakan(Request $request){
      //     $validateData = $request->validate([
      //         'nama'=>'required',
      //         'harga'=>'required|min:3|max:60',
      //         'stok'=>'required',
      //         'deskripsi'=>'required',
      //         'gambar'=>'required',
              
      //     ]);
      //     dump($validateData);
      //     $plusmakanan = new makanan();
      //     $plusmakanan->nama = $validateData['nama'];
      //     $plusmakanan->harga = $validateData['harga'];
      //     $plusmakanan->stok = $validateData['stok'];
      //     $plusmakanan->deskripsi = $validateData['deskripsi'];
      //     $plusmakanan->gambar = $validateData['gambar'];
      //     $plusmakanan->save();
  
      //     return "Data berhasil disimpan ke database";
      
      
      // }
      public function tambahmakan(request $request){

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


        $mkn = new makanan;

        $mkn->nama = $request->input('nama');
        $mkn->harga = $request->input('harga');
        $mkn->stok= $request->input('stok');
        $mkn->deskripsi = $request->input('deskripsi');
        $mkn-> gambar= $name_file;
        
        $mkn->save();

        return redirect('/makann');

        }

        public function editmakan(Request $request){
          $id = $request->id;
          $edit = makanan::where('id', $id)->update(array(
              'nama' => $request->nama,
              'harga' => $request->harga,
              'stok' => $request->stok,
              'deskripsi' => $request->deskripsi,
              'gambar' => $request->gambar,
          ));
          if ($edit) {
              echo "success";
          }else{
              echo "fail";
          }
      }

      public function edit($id){
        $makanan = Makanan::find($id);
        return view('admin.edit', ['makanan' => $makanan]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
           
        ]);
    
        $makanan = makanan::find($id);
        $makanan->nama = $request->nama;
        $makanan->harga= $request->harga;
        $makanan->stok = $request->stok;
        $makanan->deskripsi = $request->deskripsi;
        $makanan->gambar = $request->gambar;
       
        $makanan->save();
 
     return redirect('/makann');
    }
    
    public function cetak_pdf()
    {
	$makanan = makanan::all();
	$pdf = PDF::loadview('admin.maem_pdf',['makanan'=>$makanan]);
	return $pdf->download('maem_pdf.pdf');
    }

}