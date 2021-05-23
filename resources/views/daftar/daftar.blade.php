@extends('daftar.header')
@section('konten')

    <body style="background-image: url('{{ url('images/polinema.png') }}');">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap py-5">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h3 class="text-center mb-0">Sistem Informasi Nilai Mahasiswa</h3>
                            <div class="img d-flex align-items-center justify-content-center"
                                style="background-image: url('{{ url('images/polinema.png') }}');"></div>
                            <p class="text-center">Daftar Sebagai {{ strtoupper($roles) }}</p>
                            <form action="{{ route('register') }}" method="post" class="login-form">
                                @csrf
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-user"></span></div>
                                    <input type="text" name="username" class="form-control"
                                        placeholder="{{ str_contains($roles, 'mahasiswa') ? 'Masukan NIM' : (str_contains($roles, 'dosen') ? 'Masukan NIP' : 'Masukan Username') }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-lock"></span></div>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Masukan Password" required>
                                </div>
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-lock"></span></div>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Konfirmasi Password" required>
                                </div>
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-buysellads"></span></div>
                                    <input type="text" name="name" class="form-control" placeholder="Masukan Nama" required>
                                </div>
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-address-card"></span></div>
                                    <input type="text" name="extra"
                                        class="form-control"
                                        placeholder="{{ str_contains($roles, 'admin') ? 'Masukan Jabatan' : 'Masukan Alamat' }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn form-control btn-primary rounded submit px-3">Daftar</button>
                                </div>
                            </form>
                            <div class="w-100 text-center mt-4 text">
                                <a href="{{ str_contains($roles, 'mahasiswa') ? route('login.mahasiswa') : (str_contains($roles, 'dosen') ? route('login.dosen') : route('login.admin')) }}"
                                    class="glyphicon glyphicon-chevron-left">Sudah Punya Akun?
                                </a>
                                <a href="{{ url('/') }}" class="btn btn-info btn-lg">
                                    <span class="glyphicon glyphicon-home"></span> Halaman Utama
                                </a>
                            </div>
                        </div>
                        <footer class="bg-light text-center text-lg-start">
                            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                                © 2021 Copyright: Clan Anckerman
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </section>

        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="{{ url('js/popper.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>
        <script src="{{ url('js/main.js') }}"></script>

    </body>

    </html>
@endsection