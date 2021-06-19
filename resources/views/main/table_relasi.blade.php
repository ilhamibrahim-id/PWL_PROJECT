@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if ((request()->is('main/table_dosen_matakuliah')))
                                Data Pengajar
                            @elseif ((request()->is('main/table_kelas_matakuliah')))
                                Data Pelajaran
                            @endif
                        </h4>
                    </div>
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
                                        @if ((request()->is('main/table_dosen_matakuliah')))
                                            Nama Dosen
                                        @elseif ((request()->is('main/table_kelas_matakuliah')))
                                            Kelas
                                        @endif
                                    </th>
                                    <th>
                                        @if ((request()->is('main/table_dosen_matakuliah')))
                                            Nama Mata Kuliah
                                        @elseif ((request()->is('main/table_kelas_matakuliah')))
                                            Mata Kuliah
                                        @endif
                                    </th>
                                    <th>
                                        @if ((request()->is('main/table_dosen_matakuliah')))
                                            Kode Pengajar
                                        @elseif ((request()->is('main/table_kelas_matakuliah')))
                                            Dosen
                                        @endif
                                    </th>
                                    <th>
                                        @if ((request()->is('main/table_dosen_matakuliah')))
                                            Hapus Data
                                        @elseif ((request()->is('main/table_kelas_matakuliah')))
                                            Kode Pengajar
                                        @endif
                                    </th>
                                    @if ((request()->is('main/table_kelas_matakuliah')))
                                        <th>
                                            Hapus Data
                                        </th>
                                    @endif
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $kelasa)
                                        <tr>
                                            <td>
                                                @if ((request()->is('main/table_dosen_matakuliah')))
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
                                                @if ((request()->is('main/table_dosen_matakuliah')))
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
                                                @if ((request()->is('main/table_dosen_matakuliah')))
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
                                                @if ((request()->is('main/table_dosen_matakuliah')))
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <button type="button" class="btn btn-outline-danger"
                                                    onclick="location.href='/main/pengajar/hapus/{{ $kelasa->kode_pengajar }}';"><i
                                                        class="nc-icon nc-simple-remove"></i></button>
                                                @elseif ((request()->is('main/table_kelas_matakuliah')))
                                                    {{ $kelasa->kode }}
                                                @endif
                                            </td>
                                            @if ((request()->is('main/table_kelas_matakuliah')))
                                                <td>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-outline-danger"
                                                        onclick="location.href='/main/pelajaran/hapus/{{ $kelasa->kelas_id }}/{{ $kelasa->kode }}';"><i
                                                            class="nc-icon nc-simple-remove"></i></button>
                                                </td>
                                            @endif
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
