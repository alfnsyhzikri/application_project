<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendaftaran.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pendaftaran = new Pendaftaran;

        $pendaftaran->nik = $request->nik;
        $pendaftaran->nisn = $request->nisn;
        $pendaftaran->nm_siswa = $request->nm_siswa;
        $pendaftaran->tempat_lahir = $request->tempat_lahir;
        $pendaftaran->provinsi = $request->provinsi;
        $pendaftaran->kabupaten = $request->kabupaten;
        $pendaftaran->kecamatan = $request->kecamatan;
        $pendaftaran->desa = $request->desa;
        $pendaftaran->tgl_lahir = $request->tgl_lahir;
        $pendaftaran->umur = $request->umur;
        $pendaftaran->smp = $request->smp;
        $pendaftaran->foto = $request->foto;
        $pendaftaran->jk = $request->jk;
        $pendaftaran->bb = $request->bb;
        $pendaftaran->tb = $request->tb;
        $pendaftaran->sk = $request->sk;
        $pendaftaran->anak_ke = $request->anak_ke;
        $pendaftaran->agama = $request->agama;
        $pendaftaran->status = $request->status;
        $pendaftaran->tinggal_bersama = $request->tinggal_bersama;
        $pendaftaran->nmayah = $request->nmayah;
        $pendaftaran->kerja_ayah = $request->kerja_ayah;
        $pendaftaran->pddkn_ayah = $request->pddkn_ayah;
        $pendaftaran->no_ayah = $request->no_ayah;
        $pendaftaran->alamat_ayah = $request->alamat_ayah;
        $pendaftaran->nmibu = $request->nmibu;
        $pendaftaran->kerja_ibu = $request->kerja_ibu;
        $pendaftaran->pddkn_ibu = $request->pddkn_ibu;
        $pendaftaran->no_ibu = $request->no_ibu;
        $pendaftaran->alamat_ibu = $request->alamat_ibu;
        $pendaftaran->nmwali = $request->nmwali;
        $pendaftaran->kerja_wali = $request->kerja_wali;
        $pendaftaran->pddkn_wali = $request->pddkn_wali;
        $pendaftaran->no_wali = $request->no_wali;
        $pendaftaran->alamat_wali = $request->alamat_wali;
        $pendaftaran->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
