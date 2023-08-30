<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Daftar_ulang;

class DaftarUlangController extends Controller
{
    public function index()
    {
        return view('users.siswa.daftar_ulang');
    }

    public function daftarUlang(Request $request) {
        $user = Auth::user(); // Mendapatkan data pengguna yang terautentikasi
    
        if ($user->daftar_ulang === 'sudah') {
            return redirect('/daftar_ulang')->with('error', 'Anda sudah melakukan daftar ulang sebelumnya.');
        }
    
        // Proses daftar ulang di sini
        $daftar_ulang = new Daftar_ulang;

        $daftar_ulang->user_id = $user->id; 
        $daftar_ulang->nm_siswa = $user->nm_siswa;
        $daftar_ulang->SKL = $request->SKL;
        $daftar_ulang->ijazah = $request->ijazah;
        $daftar_ulang->NISN = $request->NISN;
        $daftar_ulang->KK = $request->KK;
        $daftar_ulang->KIP = $request->KIP;
        $daftar_ulang->foto = $request->foto;
    
        $daftar_ulang->save();
    
        // Set status daftar ulang pengguna menjadi "sudah"
        $user->daftar_ulang = 'sudah';
        $user->save();
    
        return redirect('/user')->with('success', 'Berhasil melakukan daftar ulang.');
    }
}
