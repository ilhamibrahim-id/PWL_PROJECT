@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (request()->is('mahasiswa/kelas'))
                                Data Kelas
                            @elseif ((request()->is('mahasiswa/matakuliah')))
                                Matakuliah
                            @elseif ((request()->is('mahasiswa/nilai')))
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
                    @if (request()->is('mahasiswa/nilai'))
                        Rata-Rata = {{ $nilai->avg('nilai') }}
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Kelas
                                    </th>
                                    <th>
                                        @if (request()->is('mahasiswa/kelas'))
                                            Nama Mahasiswa
                                        @elseif ((request()->is('mahasiswa/nilai')) ||
                                            (request()->is('mahasiswa/matakuliah')))
                                            Mata kuliah
                                        @endif
                                    </th>
                                    <th>
                                        @if (request()->is('mahasiswa/matakuliah'))
                                            Dosen
                                        @elseif ((request()->is('mahasiswa/nilai')))
                                            Nilai
                                        @endif
                                    </th>
                                    @if (request()->is('mahasiswa/matakuliah'))
                                        <th>
                                            SKS
                                        </th>
                                    @endif
                                </thead>
                                <tbody>
                                    @if (request()->is('mahasiswa/kelas'))
                                        @foreach ($kelas as $kelasa)
                                            <tr>
                                                <td>
                                                    {{ $kelasa->kelas->nama_kelas }}
                                                </td>
                                                <td>
                                                    {{ $kelasa->nama }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @elseif ((request()->is('mahasiswa/nilai')))
                                        @foreach ($kelas as $kelasa)
                                            @foreach ($kelasa->matakuliah as $mk)
                                                <tr>
                                                    <td>
                                                        {{ $kelasa->kelas->nama_kelas }}
                                                    </td>
                                                    <td>
                                                        {{ $mk->nama_mk }}
                                                    </td>
                                                    <td>
                                                        {{ $mk->pivot->nilai }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @elseif ((request()->is('mahasiswa/matakuliah')))
                                        @foreach ($kelas as $kelasa)
                                            @foreach ($kelasa->matakuliah as $mk)
                                                @foreach ($mk->dosen as $dsn)
                                                @if ($mk->pivot->kode == $dsn->pivot->kode_pengajar)
                                                    <tr>
                                                        <td>
                                                            {{ $kelasa->kelas->nama_kelas }}
                                                        </td>
                                                        <td>
                                                            {{ $mk->nama_mk }}
                                                        </td>
                                                        <td>
                                                            {{ $dsn->nama }}
                                                        </td>
                                                        <td>
                                                            {{ $mk->sks }}
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{ $kelas->render('pagination::bootstrap-4') ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('main.footer')
@endsection
