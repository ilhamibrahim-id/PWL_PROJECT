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

    <form action="/main/nilai/store" method="post">
		{{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kelas : </label>
                        <select class="custom-select" id="kelas" name="kelas" required="required">
                            <option selected>Choose...</option>
                            @foreach ($kelas as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Mahasiswa : </label>
                        <select class="custom-select" id="kode" name="kode" required="required">
                            <option selected>Choose...</option>
                            @foreach ($kode as $data)
                            <option value="{{ $data->kode_pengajar }}">{{ $data->kode_pengajar }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Matakuliah : </label>
                        <select class="custom-select" id="kode" name="kode" required="required">
                            <option selected>Choose...</option>
                            @foreach ($kode as $data)
                            <option value="{{ $data->kode_pengajar }}">{{ $data->kode_pengajar }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kode Pengajar : </label>
                        <select class="custom-select" id="kode" name="kode" required="required">
                            <option selected>Choose...</option>
                            @foreach ($kode as $data)
                            <option value="{{ $data->kode_pengajar }}">{{ $data->kode_pengajar }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nilai : </label>
                        <select class="custom-select" id="kode" name="kode" required="required">
                            <option selected>Choose...</option>
                            @foreach ($kode as $data)
                            <option value="{{ $data->kode_pengajar }}">{{ $data->kode_pengajar }}</option>
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
