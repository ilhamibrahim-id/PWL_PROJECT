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

    <form action="/main/dosen/store" method="post">
		{{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Masukan NIP Dosen : </label>
                      <input type="text" name="nip" required="required" class="form-control">
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
                        <label>Masukan Nama Dosen : </label>
                        <input type="text" name="nama" required="required" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Masukan Alamat Dosen : </label>
                        <input type="text" name="alamat" required="required" class="form-control">
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
