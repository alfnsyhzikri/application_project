@extends('layouts.template')
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

@stop


@section('Konten')

@endsection