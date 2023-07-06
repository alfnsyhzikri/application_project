<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru</title>
    <!-- Tautkan CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">  
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}

    <!-- Tautkan CSS bs-stepper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper@1.7.0/dist/css/bs-stepper.min.css">

    <style>

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-toggle {
    background-color: #f1f1f1;
    color: #333;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    }

    .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    width: 200px;
    background-color: #fff;
    border: 1px solid #ccc;
    display: none;
    animation: dropdownAnim 0.3s ease-in-out forwards;
    }

    .dropdown-menu a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: #333;
    }

    .dropdown:hover .dropdown-menu {
    display: block;
    }

    @keyframes dropdownAnim {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }}

    .hr-container {
    position: relative;
  }

  /* css untuk hr */
  .text-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .text {
    background: white;
    padding: 0 10px;
  }

/* ----------------------------------------------------- */

    .custom-file-label::after {
  /* content: "Pilih file"; */
}

.custom-file-label::before {
  /* content: "Upload"; */
}

.custom-file-input::-webkit-file-upload-button {
  display: none;
}



/* ----------------------------------------------------- */

</style>
 
    <script>
        function hitungUmur() {
          var tanggalLahir = new Date(document.getElementById("tgl_lahir").value);
          var umurTahun = new Date().getFullYear() - tanggalLahir.getFullYear();
          document.getElementById("umur").value = umurTahun + " Tahun";
        }
    </script>
    
</head>
<body>
    <div class="container mt-5">
        <div class="bs-stepper">
            <!-- Header Stepper -->
            <div class="bs-stepper-header" role="tablist">
                <div class="step" data-target="#step1">
                    <button type="button" class="step-trigger" role="tab" aria-controls="step1" id="step1-trigger">
                        Cek NIK
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#step2">
                    <button type="button" class="step-trigger" role="tab" aria-controls="step2" id="step2-trigger">
                        Calon Peserta Didik
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#step3">
                    <button type="button" class="step-trigger" role="tab" aria-controls="step3" id="step3-trigger">
                        Identitas Orang Tua
                    </button>
                </div>
                {{-- <div class="line"></div>
                <div class="step" data-target="#step4">
                    <button type="button" class="step-trigger" role="tab" aria-controls="step4" id="step4-trigger">
                        Langkah 4
                    </button>
                </div> --}}
            </div>


{{-- ================================================================================================================================================== --}}
{{-- ........................................................... CEK NIK .............................................................................. --}}

            <div class="bs-stepper-content">
                <form method="POST" action="/pendaftaran" id="formStep1" onsubmit="event.preventDefault(); validateStep1();">
                    <div id="step1" class="content" role="tabpanel" aria-labelledby="step1-trigger">
                        <h2>Formulir Pendaftaran Siswa</h2> 
                        {{-- <label class="container">
                            <input type="radio" name="radio"> Perpindahan Tugas Orang Tua/Wali
                            <span class="checkmark"></span>
                        </label> --}}
                        <table width = 100%>
                            <tr>
                                <td colspan="5">
                                    <div class="form-group">
                                        <label for="nik">NIK (Nomor Induk Kependudukan)</label>
                                        <input type="number" class="form-control" id="nik" placeholder="Masukkan NIK *" 123>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">
                                    <div class="form-group">
                                        <label for="nisn">NISN (Nomor Induk Siswa Nasional)</label>
                                        <input type="number" class="form-control" id="nisn" placeholder="Masukkan NISN *" 123>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama *" 123>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="lahir" placeholder="Tempat Lahir *" 123>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding-right: 5px">
                                    <div class="form-group">
                                        <label for="provinsi">Provinsi</label>
                                        <select name="provinsi" class="form-control" id="">
                                          <option value="" disabled selected>Pilih Provinsi *</option>
                                          <option value="aceh">Provinsi Aceh</option>
                                          <option value="luar_aceh">Luar Provinsi Aceh</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="padding: 5px"> 
                                    <div class="form-group">
                                        <label for="kabupaten">Kabupaten</label>
                                        <select name="kabupaten" class="form-control" id="" >
                                          <option value="" disabled selected>Kabupaten *</option>
                                          <option value="banda_aceh">Kota Banda Aceh</option>
                                          <option value="aceh_barat_daya">KAB. Aceh Barat Daya</option>
                                          <option value="aceh_besar">KAB. Aceh Besar</option>
                                          <option value="aceh_jaya">KAB. Aceh Jaya</option>
                                          <option value="aceh_selatan">KAB. Aceh Selatan</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="padding: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kecamatan</label>
                                        <select name="kecamatan" class="form-control" id="" >
                                          <option value="" disabled selected>Kecamatan *</option>
                                          <option value="ulee_kareng">Ulee Kareng</option>
                                          <option value="syiah_kuala">Syiah Kuala</option>
                                          <option value="kuta_alam">Kuta Alam</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="padding-left: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Desa</label>
                                        <select name="desa" class="form-control" id="" >
                                          <option value="" disabled selected> Desa *</option>
                                          <option value="ceurih">Ceurih</option>
                                          <option value="doi">Doi</option>
                                          <option value="ie_masen_ulka">Ie Masen Ulee Kareng</option>
                                          <option value="ilie">Ilie</option>
                                          <option value="lambhuk">Lambhuk</option>
                                          <option value="lamglumpang">Lamglumpang</option>
                                          <option value="lamteh">Doi</option>
                                          <option value="pango_deyah">Pango Deyah</option>
                                          <option value="pango_raya">Pango Raya</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">
                                    <div class="form-group">
                                        <label for="nama">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir *" onchange="hitungUmur()">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">
                                    <div class="form-group">
                                        <label for="umur">Umur</label>
                                        <input type="text" id="umur" class="form-control" name="umur" readonly>
                                    </div>
                                </td>
                            </tr>             
                        </table>
                        <button class="btn btn-primary" type="submit">Lanjut</button>
                    </div>
                </form>
            </div>


{{-- ================================================================================================================================================== --}}
{{-- ...................................................... CALON PESERTA DIDIK ....................................................................... --}}

            <div class="bs-stepper-content">
                <form method="POST" action="/pendaftaran" id="formStep2" onsubmit="event.preventDefault(); validateStep2();">
                    <div id="step2" class="content" role="tabpanel" aria-labelledby="step2-trigger">

                        <table width = 100%>
                            <tr>    
                                <td colspan="3">
                                    <div class="form-group">
                                        <label for="smp">Asal Sekolah</label>
                                        <input type="text" class="form-control" name="smp" id="smp" placeholder="Asal Sekolah">
                                    </div>
                                </td>
                            </tr>

                            {{-- <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label for="foto" >Foto 3x4 Latar Belakang Biru atau Merah</label>
                                        <input type="file" id="foto" name="foto" accept="image/*" class="form-control" class="custom-file-input" >
                                    </div>
                                </td>
                            </tr> --}}

                            <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label for="foto">Foto 3x4 Latar Belakang Biru atau Merah</label>
                                        <div class="custom-file">
                                          <input type="file" id="foto" name="foto" accept="image/*" class="custom-file-input">
                                          <label class="custom-file-label" for="foto"></label>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding-right: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                                        <select name="jk" class="form-control" id="" >
                                          <option value="" disabled selected>Jenis Kelamin *</option>
                                          <option value="Laki-laki">Laki-laki</option>
                                          <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="padding: 5px">
                                    <div class="form-group">
                                        <label for="BB">Berat Badan</label>
                                        <input type="number" class="form-control" name="bb" placeholder="" 123>
                                    </div>
                                </td>
                                <td  style="padding-left: 5px">
                                    <div class="form-group">
                                        <label for="TB">Tinggi Badan</label>
                                        <input type="number" class="form-control" name="tb" placeholder="" 123>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" style="padding-right: 5px">
                                    <div class="form-group">
                                        <label for="sk">Jumlah Saudara Kandung</label>
                                        <input type="number" class="form-control" name="sk" placeholder="" 123>
                                    </div>
                                </td>

                                <td style="padding-left: 5px">
                                    <div class="form-group">
                                        <label for="anak">Anak Ke</label>
                                        <input type="number" class="form-control" name="anak_ke" placeholder="" 123>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding-right: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Agama</label>
                                        <select name="agama" class="form-control" id="">
                                          <option value="" disabled selected>- *</option>
                                          <option value="islam">Islam</option>
                                          <option value="protestan">Protestan</option>
                                          <option value="katolik">Katolik</option>
                                          <option value="hindu">Hindu</option>
                                          <option value="buddha">Buddha</option>
                                          <option value="khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="padding: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status Siswa</label>
                                        <select name="status" class="form-control" id="" >
                                          <option value="" disabled selected>- *</option>
                                          <option value="yatim">Yatim</option>
                                          <option value="piatu">Piatu</option>
                                          <option value="yatim_piatu">Yatim Piatu</option>
                                        </select>
                                    </div>
                                </td>
                                <td  style="padding-left: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tinggal Bersama</label>
                                        <select name="tinggal_bersama" class="form-control" id="" >
                                          <option value="" disabled selected>- *</option>
                                          <option value="orang_tua">Orang Tua</option>
                                          <option value="wali">Wali</option>
                                          <option value="kost">Kost</option>
                                          <option value="asrama">Asrama</option>
                                          <option value="panti_asuhan">Panti Asuhan<option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <button class="btn btn-primary" type="submit">Lanjut</button>
                    </div>
                </form>
            </div>


{{-- ================================================================================================================================================== --}}
{{-- ...................................................... IDENTITAS ORANG TUA ....................................................................... --}}
            
            <div class="bs-stepper-content">
                <form method="POST" action="/pendaftaran" id="formStep3" onsubmit="event.preventDefault(); validateStep3();">
                    <div id="step3" class="content" role="tabpanel" aria-labelledby="step3-trigger">

                        <table width = 100%>
                            {{-- ----------------------------------------------  AYAH  -------------------------------------------------- --}}
                            <tr>
                                <td colspan="3">
                                    <div class="hr-container">
                                        <hr>
                                        <div class="text-container">
                                            <span class="text">BIODATA AYAH</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        
                            <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label for="nmayah">Nama Ayah</label>
                                        <input type="tel" class="form-control" id="nmayah" placeholder="Masukkan nama" r>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-right: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Pekerjaan Ayah</label>
                                        <select name="kerja_ayah" class="form-control" id="">
                                            <option value="" disabled selected> *</option>
                                            <option value="tdk_bekerja">Tidak Bekerja</option>
                                            <option value="almarhum">Almarhum</option>
                                            <option value="pensiunan">Pensiunan</option>
                                            <option value="pns_tni_polri">PNS/TNI/Polri</option>
                                            <option value="guru_dosen">Guru/Dosen</option>
                                            <option value="pegawai">Pegawai Swasta</option>
                                            <option value="wiraswasta">Pengusaha/Wiraswasta</option>
                                            <option value="dokter">Dokter/Bidan/Perawat</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="padding: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Pendidikan Ayah</label>
                                        <select name="pddkn_ayah" class="form-control" id="">
                                            <option value="" disabled selected> *</option>
                                            <option value="tdk_tmt">Tidak Tamat SD</option>
                                            <option value="sd">SD</option>
                                            <option value="sltp">SLTP</option>
                                            <option value="slta">SLTA</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="padding-left: 5px">
                                    <div class="form-group">
                                        <label for="nmayah">No Hp Ayah</label>
                                        <input type="number" class="form-control" id="tlp_ayah" placeholder="Masukkan nomor telepon" r>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label for="occupation">Alamat</label>
                                        <input type="text" class="form-control" id="alamat_ayah" placeholder="Masukkan Alamat" r>
                                    </div>
                                </td>
                            </tr>


                            {{-- ----------------------------------------------  IBU  -------------------------------------------------- --}}
                            <tr>
                                <td colspan="3">
                                    <br>
                                    <div class="hr-container">
                                        <hr>
                                        <div class="text-container">
                                            <span class="text">BIODATA IBU</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label for="ampleInputEmail1">Nama Ibu</label>
                                        <input type="tel" class="form-control" id="nmibu" placeholder="Masukkan nama" r>
                                    </div>
                                </td>
                            </tr>

                            
                            <tr>
                                <td style="padding-right: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Pekerjaan Ibu</label>
                                        <select name="kerja_ibu" class="form-control" id="">
                                            <option value="" disabled selected> *</option>
                                            <option value="tdk_bekerja">Tidak Bekerja</option>
                                            <option value="tdk_bekerja">Ibu Rumah Tangga &#40; IRT &#41;</option>
                                            <option value="almarhum">Almarhum</option>
                                            <option value="pensiunan">Pensiunan</option>
                                            <option value="pns_tni_polri">PNS/TNI/Polri</option>
                                            <option value="guru_dosen">Guru/Dosen</option>
                                            <option value="pegawai">Pegawai Swasta</option>
                                            <option value="wiraswasta">Pengusaha/Wiraswasta</option>
                                            <option value="dokter">Dokter/Bidan/Perawat</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="padding: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Pendidikan Ibu</label>
                                            <select name="pddkn_ibu" class="form-control" id="">
                                            <option value="" disabled selected> *</option>
                                            <option value="tdk_tmt">Tidak Tamat SD</option>
                                            <option value="sd">SD</option>
                                            <option value="sltp">SLTP</option>
                                            <option value="slta">SLTA</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="padding-left: 5px">
                                    <div class="form-group">
                                        <label for="nmayah">No Hp Ibu</label>
                                        <input type="number" class="form-control" id="tlp_ibu" placeholder="Masukkan nomor telepon" r>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label for="occupation">Alamat</label>
                                        <input type="text" class="form-control" id="alamat_ibu" placeholder="Masukkan Alamat" r>
                                    </div>
                                </td>
                            </tr>


                            {{-- ----------------------------------------------  WALI  -------------------------------------------------- --}}
                            <tr>
                                <td colspan="3">
                                    <br>
                                    <div class="hr-container">
                                        <hr>
                                        <div class="text-container">
                                            <span class="text">BIODATA WALI</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label for="ampleInputEmail1">Nama Wali</label>
                                        <input type="tel" class="form-control" id="nmwali" placeholder="Masukkan nama" r>
                                    </div>
                                </td>
                            </tr>

                            
                            <tr>
                                <td style="padding-right: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Pekerjaan Wali</label>
                                        <select name="kerja_wali" class="form-control" id="">
                                            <option value="" disabled selected> *</option>
                                            <option value="tdk_bekerja">Tidak Bekerja</option>
                                            <option value="pensiunan">Pensiunan</option>
                                            <option value="pns_tni_polri">PNS/TNI/Polri</option>
                                            <option value="guru_dosen">Guru/Dosen</option>
                                            <option value="pegawai">Pegawai Swasta</option>
                                            <option value="wiraswasta">Pengusaha/Wiraswasta</option>
                                            <option value="dokter">Dokter/Bidan/Perawat</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="padding: 5px">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Pendidikan Wali</label>
                                            <select name="pddkn_wali" class="form-control" id="">
                                            <option value="" disabled selected> *</option>
                                            <option value="tdk_tmt">Tidak Tamat SD</option>
                                            <option value="sd">SD</option>
                                            <option value="sltp">SLTP</option>
                                            <option value="slta">SLTA</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                </td>
                                <td style="padding-left: 5px">
                                    <div class="form-group">
                                        <label for="nmayah">No Hp Wali</label>
                                        <input type="number" class="form-control" id="tlp_wali" placeholder="Masukkan nomor telepon" r>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label for="occupation">Alamat</label>
                                        <input type="text" class="form-control" id="alamat_wali" placeholder="Masukkan Alamat" r>
                                    </div>
                                </td>
                            </tr>
                        </table>


                        
                        <br>

                        <!-- WALI -->
                            
                            
                            
                        
                       

                          
                        {{-- <button class="btn btn-primary" type="submit">Lanjut</button> --}}
                        <button class="btn btn-primary" onclick="submitForm()">Selesai</button>
                    </div>
                </form>
            </div>

            <!-- Konten Langkah 4 -->
            {{-- <div class="bs-stepper-content">
                <div id="step4" class="content" role="tabpanel" aria-labelledby="step4-trigger">
                    <h2>Langkah 4</h2>
                    <p>Ini adalah langkah terakhir dalam proses.</p>
                    <button class="btn btn-primary" onclick="stepper.previous()">Kembali</button>
                    <button class="btn btn-primary" onclick="submitForm()">Selesai</button>
                </div>
            </div> --}}
        </div>
    </div>

    <!-- Tautkan skrip Bootstrap dan bs-stepper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper@1.7.0/dist/js/bs-stepper.min.js"></script>

    <!-- Inisialisasi bs-stepper -->
    <script>
        var stepper = new Stepper(document.querySelector('.bs-stepper'));

        // Validasi Formulir pada Langkah 1
        function validateStep1() {
            if (document.getElementById('formStep1').checkValidity()) {
                stepper.next();
            } else {
                document.getElementById('formStep1').classList.add('was-validated');
            }
        }

        // Validasi Formulir pada Langkah 2
        function validateStep2() {
            if (document.getElementById('formStep2').checkValidity()) {
                stepper.next();
            } else {
                document.getElementById('formStep2').classList.add('was-validated');
            }
        }

        // Validasi Formulir pada Langkah 3
        // function validateStep3() {
        //     if (document.getElementById('formStep3').checkValidity()) {
        //         stepper.next();
        //     } else {
        //         document.getElementById('formStep3').classList.add('was-validated');
        //     }
        // }

        // Submit Formulir pada Langkah 4
        function submitForm() {
            // Lakukan logika untuk mengirim data formulir atau tindakan lain yang diinginkan
            alert('Formulir berhasil dikirim!');
        }
    </script>
</body>
</html> 
