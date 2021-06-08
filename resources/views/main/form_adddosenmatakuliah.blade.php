@extends('main.header')
@section('konten')
    <!-- End Navbar -->
    <div class="content">
      <div class="row">
            <div class="col-md-12">
          <div class="card card-user">
            <div class="card-header">
              <h5 class="card-title">Tambah Data Dosen</h5>
            </div>
            <div class="card-body">

    <form action="/main/dosen_mk/store" method="post">
		{{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Dosen : </label>
                        <select class="custom-select" id="nama" name="nama" required="required">
                            <option selected>Choose...</option>
                            @foreach ($dosen as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Mata Kuliah : </label>
                        <select class="custom-select" id="mk" name="mk" required="required">
                            <option selected>Choose...</option>
                            @foreach ($matakuliah as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_mk }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kode Pengajar : </label>
                        <input type="text" name="kode" required="required" class="form-control">
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
