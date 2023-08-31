@extends('layouts.template.siswa')
@section('Judul','Selamat Datang Calon Siswa')

@section('Menu')

  @parent
    <li class="nav-item">
        <a href="/pengumuman" class="nav-link">
            <i class="nav-icon fas fa-bullhorn"></i>
            <p>
                Pengumuman
            </p>
        </a>
    </li>

    @if(auth()->user()->status_verifikasi == "Lulus" && auth()->user()->daftar_ulang == "belum")
        <li class="nav-item">
            <a href="/daftar_ulang" class="nav-link">
                <i class="nav-icon fas fa-id-card"></i>
                <p>
                    Daftar Ulang
                </p>
            </a>
        </li>

    @elseif(Auth::user()->status_verifikasi == "Lulus" && Auth::user()->daftar_ulang == "sudah")
        <li class="nav-item">
            <a href="/minat_bakat" class="nav-link">
                <i class="nav-icon fas fa-id-card"></i>
                <p>
                    Tes Minat Bakat
                </p>
            </a>
        </li>
    @endif

@stop


@section('Konten')

    <!-- Notifikasi jika sukses melakukan daftar ulang -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection