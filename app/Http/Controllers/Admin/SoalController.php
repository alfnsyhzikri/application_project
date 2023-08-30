<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Jawaban;

class SoalController extends Controller
{
    public function index()
    {
        return view('users.admin.upload_soal');
    }

    public function upload(Request $request)
    {
        // Simpan pertanyaan
        $soal  = new Soal();
        $soal ->kategori_soal = $request->kategori_soal;
        $soal ->soal = $request->pertanyaan;
        $soal ->save();

        // Simpan jawaban
        $jawab = $request->jawaban;
        $benar = $request->kategori_jwbn;

        foreach ($jawab as $key => $jawab1) {
            $jawaban = new Jawaban();
            $jawaban->soal_id = $soal->id;
            $jawaban->jawaban = $jawab1;
            $jawaban->kategori_jwbn = ($key + 1) == $benar ? 'Benar' : 'salah';
            $jawaban->save();
        }

        return redirect()->back()->with('success', 'Pertanyaan dan jawaban berhasil diunggah.');
    }
}
