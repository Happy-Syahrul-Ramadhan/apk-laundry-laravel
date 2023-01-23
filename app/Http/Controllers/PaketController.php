<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use Auth;

class PaketController extends Controller
{
    //Tampilkan Halaman Tambah data Paket
    public function add()
    {
    	return view('pages.paket_add');
    }

    //lakukan tambah data paket
    public function store(Request $request)
    {
 	   	$paket = new Paket();

 	   	$paket->id_outlet = Auth::user()->outlet->id;
 	   	$paket->jenis = $request->jenis;
 	   	$paket->nama_paket = $request->nama_paket;
 	   	$paket->harga = $request->harga;
 	   	$paket->save();

 	   	if ($paket) {
 	   		return redirect()->route('paket')->with('sucess', 'Tambah Data Berhasil');
 	   	}
    }

    //lakukan ubah data Paket
    public function ubah($id)
    {
    	$paket = Auth::user()->outlet->paket()->where('id', $id)->first();
    	return view('pages.paket_ubah', ['paket'=>$paket]);
    }

    //lakukan ubah data paket
    public function update(Request $request, $id)
    {
        $paket = Auth::user()->outlet->paket()->where('id', $id)->first();

        $paket->id_outlet = Auth::user()->outlet->id;
        $paket->jenis = $request->jenis;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga = $request->harga;
        $paket->update();

        if ($paket) {
            return redirect()->route('paket')->with('ubah', 'Ubah Data Berhasil');
        }
    }

    //lakukan hapus data paket
    public function delete($id)
    {
    	$paket = Auth::user()->outlet->paket()->where('id', $id)->first();
    	$paket->delete();
    	return redirect()->back()->with('hapus', 'Hapus Data Berhasil');
    }
}
