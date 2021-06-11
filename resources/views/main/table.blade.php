@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (request()->is('main/table_kelas'))
                                Data Kelas
                            @elseif ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                Data Mahasiswa
                            @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                Data MataKuliah
                            @elseif ((request()->is('main/table_dosen')) ||(request()->is('main/carids')))
                                Data Dosen
                            @elseif ((request()->is('main/table_dosen_matakuliah')))
                                Data Pengajar
                            @elseif ((request()->is('main/table_kelas_matakuliah')))
                                Data Pelajaran
                            @endif
                        </h4>
                    </div>
                    @if ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                    <form method="GET" action="{{url('/main/carimhs')}}">
                        @csrf
                     <div class="input-group rounded">
                        <input type="text" class="form-control rounded" placeholder="Cari Data Mahasiswa .." value="{{ old('keyword') }}" aria-label="Search"
                            aria-describedby="search-addon" name="keyword"/>
                            <button type="submit">
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="nc-icon nc-zoom-split"></i>
                        </span>
                            </button>
                    </div>
                    </form>
                    @elseif ((request()->is('main/table_dosen')) || (request()->is('main/carids')))
                    <form method="GET" action="{{url('main/carids')}}">
                        <div class="input-group rounded">
                            <input type="text" class="form-control rounded" placeholder="Cari Data Dosen .." value="{{ old('keyword') }}" aria-label="Search"
                                aria-describedby="search-addon" name="keyword"/>
                                <button type="submit">
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="nc-icon nc-zoom-split"></i>
                            </span>
                                </button>
                        </div>
                    </form>
                    @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                    <form method="GET" action="{{url('main/carimk')}}">
                        <div class="input-group rounded">
                            <input type="text" class="form-control rounded" placeholder="Cari Data Mata Kuliah .." value="{{ old('keyword') }}" aria-label="Search"
                                aria-describedby="search-addon" name="keyword"/>
                                <button type="submit">
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="nc-icon nc-zoom-split"></i>
                            </span>
                                </button>
                        </div>
                    </form>
                    @endif
                    @if (!request()->is('main/table_kelas'))
                        <button class="btn" data-toggle="modal" data-target="#form" @if (request()->is('main/table_mhs') || request()->is('main/carimhs'))
                             onclick="location.href='/main/mahasiswa/tambah';"
                        @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                                      onclick="location.href='/main/matakuliah/tambah';"
                        @elseif ((request()->is('main/table_dosen')) ||(request()->is('main/carids')))
                                                      onclick="location.href='/main/dosen/tambah';"
                        @elseif ((request()->is('main/table_dosen_matakuliah')))
                                                      onclick="location.href='/main/dosen_mk/tambah';"
                        @elseif ((request()->is('main/table_kelas_matakuliah')))
                                                      onclick="location.href='/main/pelajaran/tambah';" @endif>
                            <i class="nc-icon nc-simple-add"> Tambah Data</i></button>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        @if (request()->is('main/table_kelas'))
                                            Kelas
                                        @elseif ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                            Nim
                                        @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                            Kode Mata Kuliah
                                        @elseif ((request()->is('main/table_dosen')) ||(request()->is('main/carids')))
                                            Nip
                                        @elseif ((request()->is('main/table_dosen_matakuliah')))
                                            Nama Dosen
                                        @elseif ((request()->is('main/table_kelas_matakuliah')))
                                            Kelas
                                        @endif
                                    </th>
                                    <th>
                                        @if (request()->is('main/table_kelas'))
                                            Jumlah Mahasiswa
                                        @elseif ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                            Nama
                                        @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                            Nama Mata Kuliah
                                        @elseif ((request()->is('main/table_dosen')) ||(request()->is('main/carids')))
                                            Nama
                                        @elseif ((request()->is('main/table_dosen_matakuliah')))
                                            Nama Mata Kuliah
                                        @elseif ((request()->is('main/table_kelas_matakuliah')))
                                            Mata Kuliah
                                        @endif
                                    </th>
                                    <th>
                                        @if (request()->is('main/table_kelas'))
                                            Action
                                        @elseif ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                            Alamat
                                        @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                            Sks
                                        @elseif ((request()->is('main/table_dosen')) ||(request()->is('main/carids')))
                                            Alamat
                                        @elseif ((request()->is('main/table_dosen_matakuliah')))
                                            Kode Pengajar
                                        @elseif ((request()->is('main/table_kelas_matakuliah')))
                                            Dosen
                                        @endif
                                    </th>
                                    <th>
                                        @if ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                            Kelas
                                        @elseif ((request()->is('main/table_kelas_matakuliah')))
                                            Kode Pengajar
                                        @endif
                                    </th>
                                    @if ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                        <th>
                                            <center>
                                            Action
                                            </center>
                                        </th>
                                    @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                        <th>
                                            <center>
                                            Action
                                            </center>
                                        </th>
                                     @elseif ((request()->is('main/table_dosen')) ||(request()->is('main/carids')))
                                        <th>
                                            <center>
                                            Action
                                            </center>
                                        </th>
                                    @endif
                                    @if ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                        <th>
                                            Hapus Data
                                        </th>
                                    @elseif ((request()->is('main/table_dosen')) ||(request()->is('main/carids')))
                                        <th>
                                            Hapus Data
                                        </th>
                                    @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                        <th>
                                            Hapus Data
                                        </th>
                                    @endif
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $kelasa)
                                        <tr>
                                            <td>
                                                @if (request()->is('main/table_kelas'))
                                                    {{ $kelasa->id_kelas }}
                                                @elseif ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                                    {{ $kelasa->nim }}
                                                @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                                    {{ $kelasa->kode_mk }}
                                                @elseif ((request()->is('main/table_dosen')) ||(request()->is('main/carids')))
                                                    {{ $kelasa->nip }}
                                                @elseif ((request()->is('main/table_dosen_matakuliah')))
                                                    @foreach ($dosen as $data)
                                                        @if ($data->id == $kelasa->dosen_id)
                                                            {{ $data->nama }}
                                                        @endif
                                                    @endforeach
                                                @elseif ((request()->is('main/table_kelas_matakuliah')))
                                                    @foreach ($kls as $data)
                                                        @if ($data->id == $kelasa->kelas_id)
                                                            {{ $data->nama_kelas }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if (request()->is('main/table_kelas'))
                                                    {{ $kelasa->mahasiswa_count ?? '' }}
                                                @elseif ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                                    {{ $kelasa->nama }}
                                                @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                                    {{ $kelasa->nama_mk }}
                                                @elseif ((request()->is('main/table_dosen')) ||(request()->is('main/carids')))
                                                    {{ $kelasa->nama }}
                                                @elseif ((request()->is('main/table_dosen_matakuliah')))
                                                    @foreach ($mk as $data)
                                                        @if ($data->id == $kelasa->matakuliah_id)
                                                            {{ $data->nama_mk }}
                                                        @endif
                                                    @endforeach
                                                @elseif ((request()->is('main/table_kelas_matakuliah')))
                                                    @foreach ($mk as $data)
                                                        @foreach ($data->dosen as $data1)
                                                            @if ($data1->pivot->kode_pengajar == $kelasa->kode)
                                                                {{ $data->nama_mk }}
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if (request()->is('main/table_kelas'))
                                                    <form action="{{ route('main.detailkelas', $kelasa->id) }}"
                                                        class="login-form">
                                                        <button type="submit"
                                                            class="btn form-control btn-primary rounded submit px-3">Detail
                                                            Kelas</button>
                                                    </form>
                                                @elseif ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                                    {{ $kelasa->alamat }}
                                                @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                                    {{ $kelasa->sks }}
                                                @elseif ((request()->is('main/table_dosen')) ||(request()->is('main/carids')))
                                                    {{ $kelasa->alamat }}
                                                @elseif ((request()->is('main/table_dosen_matakuliah')))
                                                    {{ $kelasa->kode_pengajar }}
                                                @elseif ((request()->is('main/table_kelas_matakuliah')))
                                                    @foreach ($mk as $data)
                                                        @foreach ($data->dosen as $data1)
                                                            @if ($data1->pivot->kode_pengajar == $kelasa->kode)
                                                                {{ $data1->nama }}
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                                    @if ($kelasa->kelas_id == null)
                                                    @else
                                                    {{ $kelasa->kelas->id_kelas }}
                                                    @endif
                                                @elseif ((request()->is('main/table_kelas_matakuliah')))
                                                    {{ $kelasa->kode }}
                                                @endif
                                            </td>
                                            @if ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                                <td>
                                                    @if ($kelasa->kelas_id == null)
                                                        <form action="{{ route('main.detailnilai', $kelasa->id) }}"
                                                            class="login-form">
                                                            <button type="submit"
                                                                class="btn form-control btn-primary rounded submit px-3"
                                                                disabled>Detail Nilai</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('main.detailnilai', $kelasa->id) }}"
                                                            class="login-form">
                                                            <button type="submit"
                                                                class="btn form-control btn-primary rounded submit px-3">Detail
                                                                Nilai</button>
                                                        </form>
                                                    @endif
                                                    <button type="submit" class="btn form-control btn-primary rounded submit px-3" onclick="location.href='/main/mahasiswa/edit/{{ $kelasa->id }}';">Edit Data</button>
                                                </td>
                                            @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                                <td>
                                                    <button type="submit" class="btn form-control btn-primary rounded submit px-3" onclick="location.href='/main/matakuliah/edit/{{ $kelasa->id }}';">Edit Data</button>
                                                </td>
                                            @elseif ((request()->is('main/table_dosen')) ||(request()->is('main/carids')))
                                                <td>
                                                    <button type="submit" class="btn form-control btn-primary rounded submit px-3" onclick="location.href='/main/dosen/edit/{{ $kelasa->id }}';">Edit Data</button>
                                                </td>
                                            @endif
                                            <td>
                                                @if ((request()->is('main/table_mhs')) || (request()->is('main/carimhs')))
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-outline-danger"
                                                        onclick="location.href='/main/mahasiswa/hapus/{{ $kelasa->id }}';"><i
                                                            class="nc-icon nc-simple-remove"></i></button>
                                                @elseif((request()->is('main/table_dosen')) || (request()->is('main/carids')))
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-outline-danger"
                                                        onclick="location.href='/main/dosen/hapus/{{ $kelasa->id }}';"><i
                                                            class="nc-icon nc-simple-remove"></i></button>
                                                @elseif ((request()->is('main/table_matakuliah')) || (request()->is('main/carimk')))
                                                    <button type="button" class="btn btn-outline-danger"
                                                        onclick="location.href='/main/matakuliah/hapus/{{ $kelasa->id }}';"><i
                                                            class="nc-icon nc-simple-remove"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $kelas->render('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('main.footer')
@endsection
