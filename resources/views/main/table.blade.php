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
                            @elseif ((request()->is('main/table_mhs')))
                                Data Mahasiswa
                            @elseif ((request()->is('main/table_matakuliah')))
                                Data MataKuliah
                            @elseif ((request()->is('main/table_dosen')))
                                Data Dosen
                            @elseif ((request()->is('main/table_dosen_matakuliah')))
                                Data Pengajar
                            @elseif ((request()->is('main/table_kelas_matakuliah')))
                                Data Pelajaran
                            @endif
                        </h4>
                    </div>
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="nc-icon nc-zoom-split"></i>
                        </span>
                    </div>
                    @if (!request()->is('main/table_kelas'))
                        <button class="btn" data-toggle="modal" data-target="#form" @if (request()->is('main/table_mhs'))
                             onclick="location.href='/main/mahasiswa/tambah';"
                        @elseif ((request()->is('main/table_matakuliah')))
                                                      onclick="location.href='/main/matakuliah/tambah';"
                        @elseif ((request()->is('main/table_dosen')))
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
                                        @elseif ((request()->is('main/table_mhs')))
                                            Nim
                                        @elseif ((request()->is('main/table_matakuliah')))
                                            Kode Mata Kuliah
                                        @elseif ((request()->is('main/table_dosen')))
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
                                        @elseif ((request()->is('main/table_mhs')))
                                            Nama
                                        @elseif ((request()->is('main/table_matakuliah')))
                                            Nama Mata Kuliah
                                        @elseif ((request()->is('main/table_dosen')))
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
                                        @elseif ((request()->is('main/table_mhs')))
                                            Alamat
                                        @elseif ((request()->is('main/table_matakuliah')))
                                            Sks
                                        @elseif ((request()->is('main/table_dosen')))
                                            Alamat
                                        @elseif ((request()->is('main/table_dosen_matakuliah')))
                                            Kode Pengajar
                                        @elseif ((request()->is('main/table_kelas_matakuliah')))
                                            Dosen
                                        @endif
                                    </th>
                                    <th>
                                        @if (request()->is('main/table_mhs'))
                                            Kelas
                                        @elseif ((request()->is('main/table_kelas_matakuliah')))
                                            Kode Pengajar
                                        @endif
                                    </th>
                                    @if (request()->is('main/table_mhs'))
                                        <th>
                                            <center>
                                            Action
                                            </center>
                                        </th>
                                    @elseif (request()->is('main/table_matakuliah'))
                                        <th>
                                            <center>
                                            Action
                                            </center>
                                        </th>
                                     @elseif (request()->is('main/table_dosen'))
                                        <th>
                                            <center>
                                            Action
                                            </center>
                                        </th>
                                    @endif
                                    @if (request()->is('main/table_mhs'))
                                        <th>
                                            Hapus Data
                                        </th>
                                    @elseif ((request()->is('main/table_dosen')))
                                        <th>
                                            Hapus Data
                                        </th>
                                    @elseif ((request()->is('main/table_matakuliah')))
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
                                                @elseif ((request()->is('main/table_mhs')))
                                                    {{ $kelasa->nim }}
                                                @elseif ((request()->is('main/table_matakuliah')))
                                                    {{ $kelasa->kode_mk }}
                                                @elseif ((request()->is('main/table_dosen')))
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
                                                @elseif ((request()->is('main/table_mhs')))
                                                    {{ $kelasa->nama }}
                                                @elseif ((request()->is('main/table_matakuliah')))
                                                    {{ $kelasa->nama_mk }}
                                                @elseif ((request()->is('main/table_dosen')))
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
                                                @elseif ((request()->is('main/table_mhs')))
                                                    {{ $kelasa->alamat }}
                                                @elseif ((request()->is('main/table_matakuliah')))
                                                    {{ $kelasa->sks }}
                                                @elseif ((request()->is('main/table_dosen')))
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
                                                @if (request()->is('main/table_mhs'))
                                                    @if ($kelasa->kelas_id == null)
                                                        -
                                                    @else
                                                        {{ $kelasa->kelas->id_kelas }}
                                                    @endif
                                                @elseif ((request()->is('main/table_kelas_matakuliah')))
                                                    {{ $kelasa->kode }}
                                                @endif
                                            </td>
                                            @if (request()->is('main/table_mhs'))
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
                                            @elseif (request()->is('main/table_matakuliah'))
                                                <td>
                                                    <button type="submit" class="btn form-control btn-primary rounded submit px-3" onclick="location.href='/main/matakuliah/edit/{{ $kelasa->id }}';">Edit Data</button>
                                                </td>
                                            @elseif (request()->is('main/table_dosen'))
                                                <td>
                                                    <button type="submit" class="btn form-control btn-primary rounded submit px-3" onclick="location.href='/main/dosen/edit/{{ $kelasa->id }}';">Edit Data</button>
                                                </td>
                                            @endif
                                            <td>
                                                @if (request()->is('main/table_mhs'))
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-outline-danger"
                                                        onclick="location.href='/main/mahasiswa/hapus/{{ $kelasa->id }}';"><i
                                                            class="nc-icon nc-simple-remove"></i></button>
                                                @elseif((request()->is('main/table_dosen')))
                                                    <button type="button" class="btn btn-outline-danger"
                                                        onclick="location.href='/main/dosen/hapus/{{ $kelasa->id }}';"><i
                                                            class="nc-icon nc-simple-remove"></i></button>
                                                @elseif((request()->is('main/table_matakuliah')))
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
