<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('judul')</title>

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
        width: 300px;
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

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('../../css/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('../../css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      {{-- <div class="nav-link">{{ Auth::user()->level }}</div> --}}
      <div class="nav-link">
        {{ Auth::user()->level }}
      </div>
  
      <div class="nav-link">
        {{ Auth::user()->nm_siswa }}    
      </div>

  <li class="nav-item d-none d-sm-inline-block">
    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
  </form>
  </li>

    </ul>
  </nav>
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="imgs/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="imgs/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               <li class="nav-item">
                <a href="/data_user" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data User
                  </p>
                </a>
              </li>
    
              {{-- @if(auth()->user()->level=="Administrator")
              <li class="nav-item">
                <a href="/data_user" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Seleksi Siswa Baru
                  </p>
                </a>
              </li>
    
              @elseif(auth()->user()->level=="siswa")
              <li class="nav-item">
                <a href="/siswa" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Hasil Seleksi
                  </p>
                </a>
              </li>
              @endif --}}
              
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @yield('content-header') 

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card" style="margin-top: 20px">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
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
                  <tr style="text-align: center">
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
   
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('../../plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('../../js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../../js/adminlte.min.js')}}"></script>
</body>
</html>