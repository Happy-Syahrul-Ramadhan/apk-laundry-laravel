<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    //tampilkan halaman tambah member
    public function add()
    {
    	return view('pages.member_add');
    }

    //lakukan tambah data member
    public function store(Request $request)
    {
    	$member = new Member();

    	$member->nama = $request->nama;
    	$member->alamat = $request->alamat;
    	$member->jenis_kelamin = $request->jenis_kelamin;
    	$member->tlp = $request->tlp;
    	$member->save();

    	if ($member) {
    		return redirect()->route('transaksi')->with('sucess', 'Tambah Data Berhasil');
    	}
    }

    //tampilkan halaman ubah data member
    public function ubah($id)
    {
    	$member = Member::where('id', $id)->first();
    	return view('pages.member_ubah', ['member'=>$member]);
    }

    //lakukan ubah data member
    public function update(Request $request, $id)
    {
    	$member = Member::where('id', $id)->first();

    	$member->nama = $request->nama;
    	$member->alamat = $request->alamat;
    	$member->jenis_kelamin = $request->jenis_kelamin;
    	$member->tlp = $request->tlp;
    	$member->update();

    	if ($member) {
    		return redirect()->route('transaksi')->with('ubah', 'Ubah Data Berhasil');
    	}
    }

    //lakukan hapus data member
    public function delete($id)
    {
    	$member = Member::where('id', $id)->first();
    	$member->delete();
    	return redirect()->back()->with('hapus', 'Hapus Data Berhasil');
    }
}
