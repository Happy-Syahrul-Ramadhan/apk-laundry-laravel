<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Auth;

class PageController extends Controller
{
    //tampilkian halaman dashboard
    public function dashboard()
    {
    	return view('pages.dashboard');
    }

    //tampilkian halaman Paket
    public function paket()
    {
        $paket = Auth::user()->outlet->paket()->get();
    	return view('pages.paket', ['paket'=>$paket]);
    }

    //tampilkian halaman pengguna/user
    public function pengguna()
    {
        $user = Auth::user()->outlet->user()->get();
    	return view('pages.pengguna', ['user'=>$user]);
    }

    //tampilkian halaman transaksi
    public function transaksi()
    {
        $member = Member::get();
    	return view('pages.transaksi', ['member'=>$member]);
    }

    //tampilkian halaman laporan
    public function laporan()
    {
    	return view('pages.laporan');
    } 

    //tampilkian halaman generate laporan
    public function generateLaporan(Request $request)
    {
        $mulai = $request->mulai;
        $berakhir = $request->berakhir;

        $transaksi = Auth::user()->outlet->transaksi()->where('tgl', '>=', $mulai)->where('tgl', '<=', $berakhir )->get();

        return view('print.laporan', ['transaksi'=>$transaksi]);
    }

    //tampilkian halaman pengaturan
    public function pengaturan()
    {
        $outlet = Auth::user()->outlet;
    	return view('pages.pengaturan', ['outlet'=>$outlet]);
    }

}
