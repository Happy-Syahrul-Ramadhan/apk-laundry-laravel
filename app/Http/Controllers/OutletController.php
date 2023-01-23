<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\User;
use Auth;

class OutletController extends Controller
{
    //tampilkan halaman register
    public function register()
    {
    	return view('register');
    }

    //lakukan Registrasi Outlet
    public function doRegister(Request $request)
    {
    	$outlet = new Outlet();

    	$outlet->nama = $request->nama_outlet;
    	$outlet->alamat = $request->alamat_outlet;
    	$outlet->tlp = $request->tlp_outlet;
    	$outlet->save();

    	if ($outlet) {
    		$user = new User();

    		$user->nama = $request->nama_user;
    		$user->username = $request->username_user;
    		$user->password = bcrypt($request->password_user);
    		$user->id_outlet = $outlet->id;
    		$user->role = 'admin';
    		$user->save();

    		return redirect()->route('login')->with('register', 'Registrasi Berhasil Silahkan Login');
    	}
    }

    //lakukan ubah data outlet
    public function update(Request $request)
    {
        $outlet = Auth::user()->outlet;

        $outlet->nama = $request->nama;
        $outlet->alamat = $request->alamat;
        $outlet->tlp = $request->tlp;
        $outlet->update();

        if ($outlet) {
            return redirect()->back()->with('sucess', 'Ubah Data Berhasil');
        }
    }

    //lakukan hapus data outlet
    public function delete()
    {
        $outlet = Auth::user()->outlet;
        $outlet->delete();
        return redirect()->route('login');
    }
}
