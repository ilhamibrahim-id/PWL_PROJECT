@extends('main.header')
@section('konten')
    <!-- End Navbar -->
    <div class="content">
      <div class="row">
            <div class="col-md-12">
          <div class="card card-user">
            <div class="card-header">
              <h5 class="card-title">Tambah Data Mahasiswa</h5>
            </div>
            <div class="card-body">

    <form action="/main/mahasiswa/store" method="post">
		{{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Masukan Nim : </label>
                      <input type="text" name="nim" required="required" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Masukan Password : </label>
                        <input type="text" name="password" required="required" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Masukan Nama : </label>
                        <input type="text" name="nama" required="required" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Masukan Alamat : </label>
                        <input type="text" name="alamat" required="required" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select type="kelas" name="kelas" class="form-control" id="kelas">
                        <option selected disabled>TI-1A</option>
                        @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                  </div>
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary btn-round" value="Simpan Data">Simpan Data</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@include('main.footer')
@endsection
