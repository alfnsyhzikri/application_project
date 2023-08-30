@extends('layouts.template.admin')
@section('Judul','Selamat Datang Calon Siswa')

@section('Konten')

    <style>
      .table-bordered {
        width: 100%;
        overflow-x: auto;
        border: 0px solid #ccc;
        padding: 0px;
        margin: 20px 0;
      }
      
      table {
        table-layout: fixed;
        width: 100%;
      }
      
      th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
        width: 200px;
      }

      .status-form {
        display: flex;
        align-items: center;
      }

      /* Style untuk select */
      .status-select {
        padding: 5px 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        align-content: center;
      }

    </style>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card" style="margin-top: 20px">
          <div class="card-header">
            <h3 class="card-title">Form Data User</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">  

            @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- <div class="scrollable-div"> --}}
            <div class="table-bordered">
            <table class="table table-striped">
              <thead>
              <tr>
                <th>USER</th>
                <th>NIK</th>
                <th>NISN</th>
                <th>Pendaftaran</th>
                <th>Nama Siswa</th>
                <th>Tempat Lahir</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>SMP</th>
                <th>Foto</th>
                <th>Jenis Kelamin</th>
                <th>Berat Badan</th>
                <th>Tinggi Badan</th>
                <th>Saudara Kandung</th>
                <th>Anak ke</th>
                <th>Agama</th>
                <th>Status</th>
                <th>Tinggal Bersama</th>
                <th>Nama Ayah</th>
                <th>Pekerjaan Ayah</th>
                <th>Pendidikan Ayah</th>
                <th>No. Ayah</th>
                <th>Alamat Ayah</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($user as $item)
                <tr>
                  <td>{{$item->level}}</td>
                  <td>{{$item->nik}}</td>
                  <td>{{$item->nisn}}</td>
                  <td>
                    @if ($item->status_verifikasi === 'Menunggu')
                        <form class="status-form" method="POST" action="{{ route('admin.update', $item->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="status-select-wrapper">
                                <select name="status" class="status-select" onchange="this.form.submit()">
                                    <option value="" disabled selected>  </option>
                                    <option value="Lulus" {{ old('status') === 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                    <option value="Tidak Lulus" {{ old('status') === 'Tidak Lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                                </select>
                            </div>
                            <input type="hidden" name="keterangan" value="{{ $item->keterangan }}">
                        </form>
                    @else
                        <span class="status-{{ strtolower($item->status_verifikasi) }}">{{ $item->status_verifikasi }}</span>
                    @endif
                </td>
                
                  <td>{{$item->nm_siswa}}</td>
                  <td>{{$item->tempat_lahir}}</td>
                  <td>{{$item->provinsi}}</td>
                  <td>{{$item->kabupaten}}</td>
                  <td>{{$item->kecamatan}}</td>
                  <td>{{$item->desa}}</td>
                  <td>{{$item->tgl_lahir}}</td>
                  <td>{{$item->umur}}</td>
                  <td>{{$item->smp}}</td>
                  <td>{{$item->foto}}</td>
                  <td>{{$item->jk}}</td>
                  <td>{{$item->bb}}</td>
                  <td>{{$item->tb}}</td>
                  <td>{{$item->sk}}</td>
                  <td>{{$item->anak_ke}}</td>
                  <td>{{$item->agama}}</td>
                  <td>{{$item->status}}</td>
                  <td>{{$item->tinggal_bersama}}</td>
                  <td>{{$item->nmayah}}</td>
                  <td>{{$item->kerja_ayah}}</td>
                  <td>{{$item->pddkn_ayah}}</td>
                  <td>{{$item->no_ayah}}</td>
                  <td>{{$item->alamat_ayah}}</td>

                </tr>
                @endforeach 
                
        
              </tbody>
            </table>
          </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

@endsection

    
