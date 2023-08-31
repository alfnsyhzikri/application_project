<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Jawaban;
use App\Models\TesMinatBakat;
use App\Models\KelasIpa;
use App\Models\KelasIps;
use App\Models\User;
use Auth;

class TesMinatBakatController extends Controller
{
    public function index()
    {
        return view('users.siswa.minat_bakat');
    }

    public function TesMinatBakat()
    {
        $pertanyaan = Soal::with('jawabans')->get();
        return view('users.siswa.ujian', compact('pertanyaan'));
    }

    public function submitTes(Request $request)
    {
        $submittedAnswers = $request->input('answers');

        $correctCount = 0;
        $incorrectCount = 0;
        $totalQuestions = count($submittedAnswers);
        $correctCountIPA = 0;
        $correctCountIPS = 0;

        foreach ($submittedAnswers as $questionId => $submittedAnswerId) {
            $question = Soal::findOrFail($questionId);
            $correctAnswerId = $question->jawabans()->where('kategori_jwbn', 'Benar')->first()->id;

            if ($submittedAnswerId == $correctAnswerId) {
                $correctCount++;

                if ($question->kategori_soal === 'IPA') {
                    $correctCountIPA++;
                } elseif ($question->kategori_soal === 'IPS') {
                    $correctCountIPS++;
                }
            } else {
                $incorrectCount++;
            }
        }

        $isCorrect = ($correctCount == $totalQuestions);

        $user = Auth::user(); // Ganti dengan cara Anda mengambil data user siswa

        $hasilTes = new TesMinatBakat();
        $hasilTes->user_id = $user->id;
        $hasilTes->nm_siswa = $user->nm_siswa; 
        $hasilTes->soal_count = $totalQuestions;
        $hasilTes->benar_ipa = $correctCountIPA;
        $hasilTes->benar_ips = $correctCountIPS;
        $hasilTes->jawaban_benar = $correctCount;
        $hasilTes->jawaban_salah = $incorrectCount;
        $hasilTes->save();


        $user = Auth::user();
        // $kelas = Ipa::all();
        $kelasChoice = $request->input('kelas');

        // $user = User::find($userId);

        if ($kelasChoice === 'ipa') {
            $user->KelasIpa()->create([
                'nisn' => $user->nisn,
                'nm_siswa' => $user->nm_siswa,
            ]);
        } elseif ($kelasChoice === 'ips') {
            $user->KelasIps()->create([
                'nisn' => $user->nisn,
                'nm_siswa' => $user->nm_siswa,
            ]);
        }

        return redirect()->route('index.tes')->with('success', 'Terima Kasih, Anda telah menyelesaikan Tes Minat Bakat');
    }
}
