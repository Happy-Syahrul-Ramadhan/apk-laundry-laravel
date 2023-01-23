<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Transaksi;
use App\Models\Paket;
use App\Models\DetailTransaksi;
use Auth;

class TransaksiController extends Controller
{
    //Tampilkan halaman transaksi member
    public function transaksiMember($id)
    {
    	$member = Member::where('id', $id)->first();
    	$transaksi = Auth::user()->outlet->transaksi()->where('id_member', $id)->get();

    	return view('pages.transaksi_member', ['transaksi'=>$transaksi, 'member'=>$member]);
    }

    //tampilkan halaman tambah data transaksi
    public function add($id)
    {
    	$member = Member::where('id', $id)->first();
    	return view('pages.transaksi_add', ['member'=>$member]);
    }

    //lakukan tambah data transaksi
    public function store(Request $request, $id)
    {
    	$member = Member::where('id', $id)->first();
    	$transaksi = new Transaksi();

    	$transaksi->id_outlet = Auth::user()->outlet->id;
    	$transaksi->kode_invoice = $request->kode_invoice;
    	$transaksi->id_member = $member->id;
    	$transaksi->tgl = $request->tgl;
    	$transaksi->batas_waktu = $request->batas_waktu;
    	$transaksi->tgl_bayar = $request->tgl_bayar;
    	$transaksi->biaya_tambahan = $request->biaya_tambahan;
    	$transaksi->diskon = $request->diskon;
    	$transaksi->pajak = $request->pajak;
    	$transaksi->status = $request->status;
    	$transaksi->dibayar = $request->dibayar;
    	$transaksi->id_user = Auth::user()->id;
    	$transaksi->save();

    	if ($transaksi) {
    		return redirect()->route('transaksi.detail', $transaksi->id);
    	}
    }

    //lakukan hapus data transaksi member
    public function delete($id)
    {
    	$transaksi = Auth::user()->outlet->transaksi()->where('id', $id)->first();
    	$transaksi->delete();
    	return redirect()->back()->with('hapus', 'Hapus Data Berhasil');
    }

    //tampilkan halaman transaksi detail
    public function transaksiDetail($id)
    {
    	$paket = Paket::get();
    	$id_outlet = Auth::user()->id_outlet;
    	$transaksi = Auth::user()->outlet->transaksi()->where('id', $id)->where('id_outlet', $id_outlet)->first();

    	if ($transaksi) {
    		return view('pages.transaksi_detail', ['transaksi'=>$transaksi, 'paket'=>$paket]);
    	}
    }

    //lakukan tambah data detail transaksi
    public function transaksiDetailStore(Request $request, $id)
    {
    	$DetailTransaksi = new DetailTransaksi();

    	$DetailTransaksi->id_transaksi = $id;
    	$DetailTransaksi->id_paket = $request->id_paket;
    	$DetailTransaksi->qty = $request->qty;
    	$DetailTransaksi->keterangan = $request->keterangan;
    	$DetailTransaksi->save();

    	return redirect()->back();
    }

    //tampilkan halaman ubah data transaksi
    public function ubah($id)
    {
        $member = Member::where('id', $id)->first();
        $transaksi = Auth::user()->outlet->transaksi()->where('id', $id)->first();
        return view('pages.transaksi_ubah', ['transaksi'=>$transaksi, 'member'=>$member]);
    }

    //lakukan ubah data transaksi
    public function update(Request $request, $id)
    {
        $transaksi = Auth::user()->outlet->transaksi->where('id', $id)->first();

        $transaksi->status = $request->status;
        $transaksi->dibayar = $request->dibayar;
        $transaksi->update();

        return redirect()->route('transaksi.member', $transaksi->member->id)->with('ubah', 'Ubah Data Berhasil');
    }
}
