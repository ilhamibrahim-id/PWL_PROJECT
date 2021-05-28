@extends('main.header')
@section('konten')
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Kelas</h4>
            </div>
            <div class="input-group rounded">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                  aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                  <i class="nc-icon nc-zoom-split"></i>
                </span>
              </div>
              <button class="btn" data-toggle="modal" data-target="#form" onclick="location.href='/main/form';"><i class="nc-icon nc-simple-add"> Tambah Data</i></button>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                     Kelas
                    </th>
                    <th>
                      Jumlah Mahasiswa
                    </th>
                  </thead>
                  <tbody>
                    @foreach ($kelas as $kelasa)
                    <tr>
                      <td>
                        {{ $kelasa->nama_kelas }}
                      </td>
                      <td>
                        {{ $jumlah }}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $kelas->render("pagination::bootstrap-4") }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@include('main.footer')
@endsection
