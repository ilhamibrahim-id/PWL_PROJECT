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
                                        Kelas
                                    </th>
                                    <th>
                                        @if (request()->is('dosen/kelas'))
                                            Jumlah Mahasiswa
                                        @elseif ((request()->is('dosen/nilai')))
                                            Mata kuliah
                                        @endif
                                    </th>
                                    <th>
                                        @if (request()->is('dosen/kelas'))
                                            Mata Kuliah
                                        @elseif ((request()->is('dosen/nilai')))
                                            Nilai Tertinggi
                                        @endif
                                    </th>
                                    <th>
                                        @if (request()->is('dosen/kelas'))
                                            Action
                                        @elseif ((request()->is('dosen/nilai')))
                                            Nilai Terendah
                                        @endif
                                    </th>
                                    @if (request()->is('dosen/nilai'))
                                        <th>
                                            Nilai Rata Rata
                                        </th>
                                    @endif
                                    @if (request()->is('dosen/nilai'))
                                        <th>
                                            Action
                                        </th>
                                    @endif
                                </thead>
                                <tbody>
                                    @if (request()->is('dosen/kelas'))
                                        @foreach ($kelas as $kelasa)
                                            @foreach ($kelasa->kelas as $kls)
                                                @if ($kls->pivot->kode == $kode->kode_pengajar)
                                                    <tr>
                                                        <td>
                                                            {{ $kls->nama_kelas }}
                                                        </td>
                                                        <td>
                                                            {{ $kls->mahasiswa_count }}
                                                        </td>
                                                        <td>
                                                            {{ $kelasa->nama_mk }}
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('main.detailkelas', $kls->id) }}"
                                                                class="login-form">
                                                                <button type="submit"
                                                                    class="btn form-control btn-primary rounded submit px-3">Detail
                                                                    Kelas</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @elseif ((request()->is('dosen/nilai')))
                                        @foreach ($kelas as $kelasa)
                                            <tr>
                                                <td>
                                                    Nilai Terendah
                                                </td>
                                                <td>
                                                    Nilai Terendah
                                                </td>
                                                <td>
                                                    Nilai Terendah
                                                </td>
                                                <td>
                                                    Nilai Terendah
                                                </td>
                                                <td>
                                                    Nilai Terendah
                                                </td>
                                                <td>
                                                    <form action="{{ route('main.detailkelas', $kelasa->id) }}"
                                                        class="login-form">
                                                        <button type="submit"
                                                            class="btn form-control btn-primary rounded submit px-3">Detail
                                                            Kelas</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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
