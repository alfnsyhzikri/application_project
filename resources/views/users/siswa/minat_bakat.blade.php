@extends('layouts.template.siswa')
@section('Judul','Tes Minat Bakat')

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

    

    @if(Auth::user()->status_verifikasi == "Lulus" && Auth::user()->daftar_ulang == "sudah")
        <li class="nav-item">
            <a href="/minat_bakat" class="nav-link active bg-white">
                <i class="nav-icon fas fa-id-card"></i>
                <p>
                    Tes Minat Bakat
                </p>
            </a>
        </li>
    @endif

@endsection


@section('Konten')

    <div class="card mr-3 ml-3">
        <div class="card-header">
            <h3 class="card-title" ><strong>Tes Minat Bakat</strong></h3>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div style="display: flex; justify-content: space-between;">
                <table border="1" cellpadding="5">
                    <tr>
                        <th style="width: 300px; padding-left: 15px">NAMA</th>
                        <td  style="width: 300px; padding-left: 15px">{{ Auth::user()->nm_siswa }}</td>
                    </tr>
                    <tr>
                        <th style="padding-left: 15px">NISN</th>
                        <td style="padding-left: 15px">{{ Auth::user()->nisn }}</td>
                    </tr>
                    <tr>
                        <th style="padding-left: 15px">SOAL</th>
                        <td style="padding-left: 15px">10 Soal</td>
                    </tr>
                    <tr>
                        <th style="padding-left: 15px">WAKTU</th>
                        <td style="padding-left: 15px">10 menit</td>
                    </tr>
                </table>

                <table border="0" cellpadding="5">
                    <tr>
                      <th style="width: 300px; text-align: center" colspan="2">HARAP PERHATIKAN JADWAL UJIAN DAN WAKTU YANG TELAH DITENTUKAN </th>
                    </tr>

                    <tr>
                        <td style="width: 300px;"></td>
                        <td style="width: 300px;"></td>
                    </tr>

                    <tr>
                        @php
                              $userId = Auth::id();
                              $statusUjian = \App\Models\TesMinatBakat::where('user_id', $userId)->exists();
                        @endphp

                        @if ($statusUjian)
                            <td><button type="button" class="btn btn-block btn-secondary" disabled>Anda Telah Mengikuti Ujian</button></td>
                        @else
                          <td><a href="/tes_minat_bakat"><button type="button" class="btn btn-block btn-success">Mulai Ujian</button></a></td>
                        @endif
                        
                        <td>
                            <div style="display: flex; justify-content: center;  align-items: center; background-color: steelblue; color: white; border-radius: 5px; width: auto; height: 38px">
                                Waktu Hitung Mundur
                            </div>
                        </td>
                    </tr>

                </table>
              </div>
                

            </div>
        </div>

@endsection