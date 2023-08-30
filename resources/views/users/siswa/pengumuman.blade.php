@extends('layouts.template')
@section('Judul','PENGUMUMAN')

@section('Menu')

  @parent
    <li class="nav-item">
      <a href="/pengumuman" class="nav-link active bg-white">
          <i class="nav-icon fas fa-bullhorn"></i>
          <p>
            Pengumuman
          </p>
      </a>
    </li>

@stop


@section('Konten')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green">01 Sep 2023</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-bullhorn bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                  <h3 class="timeline-header"> <!--<a href="#">Support Team</a> -->
                    <strong>PENGUMUMAN</strong>
                  </h3>

                  <div class="timeline-body">

                    @if (auth()->user()->status_verifikasi === 'Lulus')
                        <div class="alert alert-success">
                            <strong>Selamat!</strong> Anda dinyatakan LULUS.
                        </div>
                    @elseif (auth()->user()->status_verifikasi === 'Tidak Lulus')
                        <div class="alert alert-danger">
                          Mohon Maaf!</strong> Anda dinyatakan tidak lulus seleksi pendaftaran. <br>
                          TETAP SEMANGAT DAN JANGAN PUTUS ASA
                        </div>
                    @else ()
                        <div class="alert alert-warning">
                          Hasil seleksi pendaftaran akan di tampilkan disini, harap menunggu . . .
                        </div>
                    @endif

                  </div>
                </div>
              </div>
              <!-- END timeline item -->

            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>
    <!-- /.content -->
@stop