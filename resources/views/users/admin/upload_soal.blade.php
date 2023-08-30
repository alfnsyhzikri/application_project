@extends('layouts.template.admin')
@section('Judul','Upload Soal')

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
            <h3 class="card-title">Upload Soal Tes Minat Bakat</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('soal.upload') }}" method="post" enctype="multipart/form-data">
                @csrf

                <tr>
                    <td>
                        <div class="form-group">
                            <label for="soal" class="form-label" style="font-weight: normal">Kategori Soal</label>
                            <select name="kategori_soal" class="form-control" id="">
                                <option value="" disabled selected> </option>
                                <option value="IPA">IPA</option>
                                <option value="IPS">IPS</option>
                            </select>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="pertanyaan" class="form-label" style="font-weight: normal">Pertanyaan</label>
                            <textarea name="pertanyaan" id="pertanyaan" class="form-control" rows="5" style="width: 100%; height: 100px;" placeholder="Masukkan soal ..."></textarea>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="answers" class="form-label" style="font-weight: normal">Pilihan Jawaban</label>
                            <input type="text" name="jawaban[]" placeholder=" Jawaban 1" class="mr-5 ml-5" style="width: 200px; height: 40px; border-radius: 7px;">
                            <input type="text" name="jawaban[]" placeholder=" Jawaban 2" class="mr-5" style="width: 200px; height: 40px; border-radius: 7px;">
                            <input type="text" name="jawaban[]" placeholder=" Jawaban 3" class="mr-5" style="width: 200px; height: 40px; border-radius: 7px;">
                            <input type="text" name="jawaban[]" placeholder=" Jawaban 4" class="mr-5" style="width: 200px; height: 40px; border-radius: 7px;">
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="kategori_jwbn" class="form-label" style="font-weight: normal">Jawaban Benar</label>
                            <select name="kategori_jwbn" class="form-control" id="">
                                <option value=""disabled selected></option>
                                <option value="1">Jawaban 1</option>
                                <option value="2">Jawaban 2</option>
                                <option value="3">Jawaban 3</option>
                                <option value="4">Jawaban 4</option>
                            </select>
                        </div>
                    </td>
                </tr>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
        </div>
    </section>
@endsection

