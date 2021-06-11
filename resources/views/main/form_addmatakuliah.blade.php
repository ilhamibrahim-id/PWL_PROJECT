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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </ul>
                </div>
            @endif
    <form action="/main/matakuliah/store" method="post">
		{{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Masukan Kode Mata Kuliah : </label>
                      <input type="text" name="kode_mk" required="required" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Masukan Nama Mata Kuliah : </label>
                        <input type="text" name="nama_mk" required="required" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Masukan Sks Mata Kuliah : </label>
                        <input type="text" name="sks" required="required" class="form-control">
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary btn-round" value="Simpan Data">Simpan Data</button>
                  </div>
                </div>
              </form>
              <form action="{{ route('main.table_matakuliah') }}" class="login-form">
                <button type="submit"
                    class="btn form-control btn-primary rounded submit px-3">Kembali</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@include('main.footer')
@endsection
