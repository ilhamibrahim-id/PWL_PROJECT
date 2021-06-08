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
              @if((request()->is('main/table_mhs')))
              <button class="btn" data-toggle="modal" data-target="#form" onclick="location.href='/main/mahasiswa/tambah';"><i class="nc-icon nc-simple-add"> Tambah Data</i></button>
              @elseif ((request()->is('main/table_matakuliah')))
              <button class="btn" data-toggle="modal" data-target="#form" onclick="location.href='/main/matakuliah/tambah';"><i class="nc-icon nc-simple-add"> Tambah Data</i></button>
              @elseif ((request()->is('main/table_dosen')))
              <button class="btn" data-toggle="modal" data-target="#form" onclick="location.href='/main/dosen/tambah';"><i class="nc-icon nc-simple-add"> Tambah Data</i></button>
              @endif
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                        @if((request()->is('main/table_kelas')))
                        Kelas
                        @elseif ((request()->is('main/table_mhs')))
                        Nim
                        @elseif ((request()->is('main/table_matakuliah')))
                        Kode Mata Kuliah
                        @elseif ((request()->is('main/table_dosen')))
                        Nip
                      @endif
                    </th>
                    <th>
                        @if((request()->is('main/table_kelas')))
                        Jumlah Mahasiswa
                        @elseif ((request()->is('main/table_mhs')))
                        Nama
                        @elseif ((request()->is('main/table_matakuliah')))
                        Nama Mata Kuliah
                        @elseif ((request()->is('main/table_dosen')))
                        Nama
                      @endif
                    </th>
                    <th>
                      @if((request()->is('main/table_kelas')))
                      Action
                      @elseif ((request()->is('main/table_mhs')))
                      Alamat
                      @elseif ((request()->is('main/table_matakuliah')))
                      Sks
                      @elseif ((request()->is('main/table_dosen')))
                      Alamat
                    @endif
                  </th>
                    @if ((request()->is('main/table_mhs')))
                    <th>
                      Kelas
                    </th>
                    @endif
                    @if ((request()->is('main/table_mhs')))
                    <th>
                      Action
                    </th>
                    @endif
                    @if ((request()->is('main/table_mhs')))
                    <th>
                      Hapus Data
                    </th>
                    @endif
                  </thead>
                  <tbody>
                    @foreach ($kelas as $kelasa)
                    <tr>
                      <td>
                        @if((request()->is('main/table_kelas')))
                        {{ $kelasa->id_kelas }}
                        @elseif ((request()->is('main/table_mhs')))
                        {{ $kelasa->nim }}
                        @elseif ((request()->is('main/table_matakuliah')))
                        {{ $kelasa->kode_mk }}
                        @elseif ((request()->is('main/table_dosen')))
                        {{ $kelasa->nip }}
                      @endif
                      </td>
                      <td>
                        @if((request()->is('main/table_kelas')))
                        {{ $kelasa->mahasiswa_count ?? '' }}
                        @elseif ((request()->is('main/table_mhs')))
                        {{ $kelasa->nama }}
                        @elseif ((request()->is('main/table_matakuliah')))
                        {{ $kelasa->nama_mk }}
                        @elseif ((request()->is('main/table_dosen')))
                        {{ $kelasa->nama }}
                      @endif
                      </td>
                      <td>
                        @if((request()->is('main/table_kelas')))
                        <form action="{{ route('main.detailkelas',$kelasa->id) }}" class="login-form">
                          <button type="submit" class="btn form-control btn-primary rounded submit px-3">Detail Kelas</button>
                        </form>
                        @elseif ((request()->is('main/table_mhs')))
                        {{ $kelasa->alamat }}
                        @elseif ((request()->is('main/table_matakuliah')))
                        {{ $kelasa->sks }}
                        @elseif ((request()->is('main/table_dosen')))
                        {{ $kelasa->alamat }}
                      @endif
                      </td>
                      @if ((request()->is('main/table_mhs')))
                      <td>
                        @if ($kelasa->kelas_id == null)
                            -
                        @else
                          {{ $kelasa->kelas->id_kelas }}
                        @endif
                      </td>
                      @endif
                      @if ((request()->is('main/table_mhs')))
                      <td>
                        @if ($kelasa->kelas_id == null)
                        <form action="{{ route('main.detailnilai',$kelasa->id) }}" class="login-form">
                          <button type="submit" class="btn form-control btn-primary rounded submit px-3" disabled>Detail Nilai</button>
                        </form>
                        @else
                        <form action="{{ route('main.detailnilai',$kelasa->id) }}" class="login-form">
                          <button type="submit" class="btn form-control btn-primary rounded submit px-3">Detail Nilai</button>
                        </form>
                        @endif
                      </td>
                      @endif
                      <td align="center">
                        @if((request()->is('main/table_mhs')))
                        <button type="button" class="btn btn-outline-danger" onclick="location.href='/main/mahasiswa/hapus/{{ $kelasa->id }}';"><i class="nc-icon nc-simple-remove"></i></button>
                        @endif
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
