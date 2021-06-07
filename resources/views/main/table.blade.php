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
                      @endif
                    </th>
                    <th>
                        @if((request()->is('main/table_kelas')))
                        Jumlah Mahasiswa
                        @elseif ((request()->is('main/table_mhs')))
                        Nama
                      @endif
                    </th>
                    <th>
                      @if((request()->is('main/table_kelas')))
                      Action
                      @elseif ((request()->is('main/table_mhs')))
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
                  </thead>
                  <tbody>
                    @foreach ($kelas as $kelasa)
                    <tr>
                      <td>
                        @if((request()->is('main/table_kelas')))
                        {{ $kelasa->id_kelas }}
                        @elseif ((request()->is('main/table_mhs')))
                        {{ $kelasa->nim }}
                      @endif
                      </td>
                      <td>
                        @if((request()->is('main/table_kelas')))
                        {{ $kelasa->mahasiswa_count ?? '' }}
                        @elseif ((request()->is('main/table_mhs')))
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
                        <form action="{{ route('main.detailnilai',$kelasa->id) }}" class="login-form">
                          <button type="submit" class="btn form-control btn-primary rounded submit px-3">Edit Data</button>
                        </form>
                        @else
                        <form action="{{ route('main.detailnilai',$kelasa->id) }}" class="login-form">
                          <button type="submit" class="btn form-control btn-primary rounded submit px-3">Detail Nilai</button>
                        </form>
                        <form action="{{ route('main.detailnilai',$kelasa->id) }}" class="login-form">
                          <button type="submit" class="btn form-control btn-primary rounded submit px-3">Edit Data</button>
                        </form>
                        @endif
                      </td>
                      @endif
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
