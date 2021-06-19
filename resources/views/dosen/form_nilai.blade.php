@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Kelas {{ $kelas->id_kelas }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Kelas
                                    </th>
                                    <th>
                                        Nim
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Nilai
                                    </th>
                                    <th>
                                        Tambah Nilai
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($kelas->mahasiswa as $kelasa)
                                        @foreach ($kelasa->matakuliah as $mk)
                                            @if ($mk->pivot->kode == $kode)
                                                <tr>
                                                    <td>
                                                        {{ $kelas->id_kelas }}
                                                    </td>
                                                    <td>
                                                        {{ $kelasa->nim }}
                                                    </td>
                                                    <td>
                                                        {{ $kelasa->nama }}
                                                    </td>
                                                    <td>
                                                        {{ $mk->pivot->nilai }}
                                                    </td>
                                                    <td>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <button type="submit"
                                                            class="btn form-control btn-primary rounded submit px-3"
                                                            onclick="location.href='/dosen/berinilai/{{ $kelasa->id }}/{{ $mk->pivot->kode }}/{{ $kelas->id }}';">Tambah
                                                            Nilai</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            <form action="{{ route('dosen.nilai') }}" class="login-form">
                                <button type="submit"
                                    class="btn form-control btn-primary rounded submit px-3">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('main.footer')
@endsection
