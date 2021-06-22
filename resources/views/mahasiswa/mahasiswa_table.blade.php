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
                            @elseif ((request()->is('mahasiswa/nilai')))
                                Nilai
                            @endif
                        </h4>
                    </div>
                    @if (request()->is('mahasiswa/nilai'))
                        <form action="{{ route('cetak') }}" class="login-form">
                            <button type="submit" class="btn form-control btn-primary rounded submit px-3">Cetak
                                Pdf</button>
                        </form>
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
                                    @if ((request()->is('mahasiswa/nilai')))
                                    <th>
                                            Dosen
                                    </th>
                                    <th>
                                            SKS
                                    </th>
                                    <th>
                                        Nilai

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
                                            @foreach ($mk->dosen as $dsn)
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
                                                    <td>
                                                        {{ $mk->pivot->nilai }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            Rata-Rata = {{ $nilai->avg('nilai') }}
                            {{ $kelas->render('pagination::bootstrap-4') ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('main.footer')
@endsection
