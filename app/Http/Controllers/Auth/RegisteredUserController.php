<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nik' => ['required', 'string', 'max:255'],
            'nisn' => ['required', 'string', 'max:255'],
            'nm_siswa' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'provinsi' => ['required', 'string', 'max:255'],
            'kabupaten' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'desa' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['required', 'string', 'max:255'],
            'umur' => ['required', 'string', 'max:255'],
            'smp' => ['required', 'string', 'max:255'],
            'foto' => ['required', 'string', 'max:255'],
            'jk' => ['required', 'string', 'max:255'],
            'bb' => ['required', 'string', 'max:255'],
            'tb' => ['required', 'string', 'max:255'],
            'sk' => ['required', 'string', 'max:255'],
            'anak_ke' => ['required', 'string', 'max:255'],
            'agama' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'tinggal_bersama' => ['required', 'string', 'max:255'],
            'nmayah' => ['required', 'string', 'max:255'],
            'kerja_ayah' => ['required', 'string', 'max:255'],
            'pddkn_ayah' => ['required', 'string', 'max:255'],
            'no_ayah' => ['required', 'string', 'max:255'],
            'alamat_ayah' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'nisn' => $request->nisn,
            'nm_siswa' => $request->nm_siswa,
            'tempat_lahir' => $request->tempat_lahir,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'tgl_lahir' => $request->tgl_lahir,
            'umur' => $request->umur,
            'smp' => $request->smp,
            'foto' => $request->foto,
            'jk' => $request->jk,
            'bb' => $request->bb,
            'tb' => $request->tb,
            'sk' => $request->sk,
            'anak_ke' => $request->anak_ke,
            'agama' => $request->agama,
            'status' => $request->status,
            'tinggal_bersama' => $request->tinggal_bersama,
            'nmayah' => $request->nmayah,
            'kerja_ayah' => $request->kerja_ayah,
            'pddkn_ayah' => $request->pddkn_ayah,
            'no_ayah' => $request->no_ayah,
            'alamat_ayah' => $request->alamat_ayah,
            // 'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
