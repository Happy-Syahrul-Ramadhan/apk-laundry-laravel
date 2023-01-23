<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    //tampilkan halaman login
    public function login()
    {
    	return view('login');
    }

    //lakukan Login
    public function doLogin(Request $request)
    {
    	$data = $request->only('username', 'password');
    	if (Auth::attempt($data)) {
    		$request->session()->regenerate();
    		return redirect()->route('dashboard');
    	}

    	return redirect()->back()->with('eror', 'username atau password salah');
    }

    //lakukan tambah data Pengguna/User
    public function add()
    {
        return view('pages.pengguna_add');
    }

    //lakukan tambah data pengguna/user
    public function store(Request $request)
    {
        $user = new User();

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->id_outlet = Auth::user()->outlet->id;
        $user->role = $request->role;
        $user->save();

        if ($user) {
            return redirect('pengguna')->with('sucess', 'Tambah Data Berhasil');
        }
    }

    //tampilkan halaman ubah data pengguna
    public function ubah($id)
    {
        $user = Auth::user()->outlet->user()->where('id', $id)->first();
        return view('pages.pengguna_ubah', ['user'=>$user]);
    }

    //lakukan ubah data paket
    public function update(Request $request, $id)
    {
        $user = Auth::user()->outlet->user()->where('id', $id)->first();

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->id_outlet = Auth::user()->outlet->id;
        $user->role = $request->role;
        $user->update();

        if ($user) {
            return redirect('pengguna')->with('ubah', 'Ubah Data Berhasil');
        }
    }

    //lakukan hapus data pengguna/user
    public function delete($id)
    {
        $user = Auth::user()->outlet->user()->where('id', $id)->first();
        $user->delete();
        return redirect()->back()->with('hapus', 'Hapus Data Berhasil');
    }

    //lakukan logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
