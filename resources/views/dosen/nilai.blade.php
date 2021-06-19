@extends('main.header')
@section('konten')
    <!-- End Navbar -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Nilai</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/dosen/nilai/store" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nim : </label>
                                        <input type="text" name="nim" required="required" class="form-control" value="{{ $mahasiswa->nim }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Masukan Nilai : </label>
                                        <input type="text" name="nilai" required="required" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="kode" value="{{ $kode }}">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" name="kelas" value="{{ $kelas }}">
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round" value="Simpan Data">Simpan</button>
                                </div>
                            </div>
                        </form>
                        <button type="submit" class="btn form-control btn-primary rounded submit px-3"
                            onclick="location.href='/dosen/detailkelas/{{ $kelas }}/{{ $kode}}';">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('main.footer')
@endsection
