@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Kelas {{ $kelas->id_kelas }}</h4>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('dosen.faststore') }}" class="login-form" method="POST">
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
                                                            <input type="hidden" name="id[]" value="{{ $kelasa->id }}">
                                                        </td>
                                                        <td>
                                                            {{ $kelasa->nama }}
                                                        </td>
                                                        <td>
                                                            <input type="text" name="nilai[]" id="nilai"
                                                                value="{{ $mk->pivot->nilai }}">
                                                            <input type="hidden" name="kode[]"
                                                                value="{{ $mk->pivot->kode }}">
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                                @csrf
                                <button type="submit"
                                    class="btn form-control btn-primary rounded submit px-3">Simpan</button>
                            </form>
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
