@extends('layouts.template.admin')
@section('Judul','Selamat Datang Calon Siswa')

@section('Konten')

    <!-- Notifikasi jika sukses melakukan daftar ulang -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection