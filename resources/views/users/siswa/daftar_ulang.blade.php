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

    @if(auth()->user()->status_verifikasi == "Lulus" && auth()->user()->daftar_ulang == "belum")
        <li class="nav-item">
            <a href="/daftar_ulang" class="nav-link active bg-white">
                <i class="nav-icon fas fa-id-card"></i>
                <p>
                    Daftar Ulang
                </p>
            </a>
        </li>
    @endif

@stop


@section('Konten')

<section class="content">

    <!-- Notifikasi jika eror melakukan daftar ulang -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <!-- Default box -->
    <div class="card mr-3 ml-3">
      <div class="card-header">
        <h3 class="card-title">Daftar Ulang</h3>
      </div>
      <div class="card-body">
          <form action="{{ route('submit.daftar_ulang') }}">
            @csrf
              <tr>
                  <td>
                      <div class="form-group">
                          <label for="SKL" style="font-weight: normal;">Sertifikat Hasil Ujian Nasional (SKL) / Surat Keterangan Lulus (SKL)</label>
                          <div class="custom-file">
                            <input type="file" id="SKL" name="SKL"  accept=".jpg, .jpeg" class="custom-file-input" style="cursor: pointer">
                            <label class="custom-file-label" for="SKL"></label>
                          </div>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      <div class="form-group">
                          <label for="ijazah" style="font-weight: normal;">Ijazah SMP</label>
                          <div class="custom-file">
                            <input type="file" id="ijazah" name="ijazah" accept=".jpg, .jpeg" class="custom-file-input" style="cursor: pointer">
                            <label class="custom-file-label" for="ijazah"></label>
                          </div>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      <div class="form-group">
                          <label for="NISN" style="font-weight: normal;">Nomor Induk Siswa Nasional (NISN)</label>
                          <div class="custom-file">
                            <input type="file" id="NISN" name="NISN" accept=".jpg, .jpeg" class="custom-file-input" style="cursor: pointer">
                            <label class="custom-file-label" for="NISN"></label>
                          </div>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      <div class="form-group">
                          <label for="KK" style="font-weight: normal;">Kartu Keluarga (KK)</label>
                          <div class="custom-file">
                            <input type="file" id="KK" name="KK" accept=".jpg, .jpeg" class="custom-file-input" style="cursor: pointer">
                            <label class="custom-file-label" for="KK"></label>
                          </div>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      <div class="form-group">
                          <label for="KIP" style="font-weight: normal;">Kartu Indonesia Pintar (KIP) dan Kartu Keluarga Sejahtera (KKS)</label>
                          <div class="custom-file">
                            <input type="file" id="KIP" name="KIP" accept=".jpg, .jpeg" class="custom-file-input" style="cursor: pointer">
                            <label class="custom-file-label" for="KIP"></label>
                          </div>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      <div class="form-group">
                          <label for="foto" style="font-weight: normal;">Foto berwarna biru ukuran (4 x 6)</label>
                          <div class="custom-file">
                            <input type="file" id="foto" name="foto" accept=".jpg, .jpeg" class="custom-file-input" style="cursor: pointer">
                            <label class="custom-file-label" for="foto"></label>
                          </div>
                      </div>
                  </td>
              </tr>
              <button type="submit" class="btn btn-primary">Tambah Data</button>
          </form>
      </div>
    </div>

  </section>

@endsection