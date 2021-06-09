@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (request()->is('dosen/kelas'))
                                Data Kelas
                            @elseif ((request()->is('dosen/nilai')))
                                Nilai
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        @if (request()->is('dosen/kelas'))
                                Data Kelas
                            @elseif ((request()->is('dosen/nilai')))
                                Nilai
                            @endif
                                    </th>
                                    <th>
                                        @if (request()->is('dosen/kelas'))
                                Data Kelas
                            @elseif ((request()->is('dosen/nilai')))
                                Nilai
                            @endif
                                    </th>
                                    <th>
                                        @if (request()->is('dosen/kelas'))
                                Data Kelas
                            @elseif ((request()->is('dosen/nilai')))
                                Nilai
                            @endif
                                    </th>
                                    <th>
                                        @if (request()->is('dosen/kelas'))
                                Data Kelas
                            @elseif ((request()->is('dosen/nilai')))
                                Nilai
                            @endif
                                    </th>
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
                                                </td>
                                            @endif
                                            <td>
                                                @if (request()->is('main/table_mhs'))
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