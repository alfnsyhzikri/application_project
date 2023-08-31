<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light" style="background-color: rgb(4, 159, 125)">
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <div class="nav-link" style="color: white">
                    {{ Auth::user()->nm_siswa }}    
                </div>
            </ul>
        </nav>

        <!-- Konten -->
        <div style="display: flex; justify-content: center; margin-top: 30px">
            <table border="1" style="width: 1000px; border: 2px solid rgb(4, 159, 125);">
                <tr>
                    <td style="text-align: center; padding: 13px; background-color: rgb(4, 159, 125); color: white">
                        Tes Minat Bakat
                    </td>
                </tr>

                <tr>
                    <td>
                        <div style="max-height: 550px; overflow-y: auto; padding: 10px; text-align: justify;">
                            <table border="0" style="width: 100%;">
                                <form action="{{ route('tes.submit') }}" method="post">
                                    @csrf
                                    @foreach($pertanyaan as $question)
                                        <tr>
                                            <td style="padding: 10px;">
                                                <div style="display: flex;">
                                                    <div style="width: 40px; flex-shrink: 0;">
                                                        {{ $loop->iteration }}.
                                                    </div>
                                                    <div style="flex-grow: 1;">
                                                        {{ $question->soal }}
                                                        @foreach($question->jawabans as $answer)
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" type="radio" id="answer_{{ $answer->id }}" name="answers[{{ $question->id }}]" value="{{ $answer->id }}">
                                                                <label for="answer_{{ $answer->id }}" class="custom-control-label" style="font-weight: normal;">{{ $answer->jawaban }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td style="width: 100%; height: auto; padding: 10px; display: flex;">
                                            <div style=" width: 40px">
                                                11.
                                            </div>
                                            <div>
                                                Jurusan apa yang akan kamu ambil?
            
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" name="kelas" id="Ipa" value="ipa">
                                                    <label for="Ipa" class="custom-control-label" style="font-weight: normal;">IPA</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" name="kelas" id="Ips" value="ips">
                                                    <label for="Ips" class="custom-control-label" style="font-weight: normal;">IPS</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
        <button type="submit" class="btn btn-success" style="margin-left: 1195px; margin-top: 10px">Submit</button>
        </form>
        
    </div>
</body>
</html>
