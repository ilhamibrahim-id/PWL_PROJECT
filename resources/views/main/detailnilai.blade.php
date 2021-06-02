@extends('main.header')
@section('konten')
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Detail Nilai {{ $kelas->nim }}</h4>
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
                      Mata Kuliah
                    </th>
                    <th>
                      Dosen
                    </th>
                    <th>
                      Nilai
                    </th>
                  </thead>
                  <tbody>
                    @foreach ($kelas->matakuliah as $kelasa)
                    <tr>
                      <td>
                        {{ $kelas->kelas->id_kelas }}
                      </td>
                      <td>
                        {{ $kelasa->nama_mk }}
                      <td>
                      </td>
                      <td>
                        {{ $kelasa->pivot->nilai }}
                      <td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <form action="{{ route('main.table_mhs') }}" class="login-form">
                <button type="submit" class="btn form-control btn-primary rounded submit px-3">Kembali</button>
                </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@include('main.footer')
@endsection
