@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Kelas {{ $kelas->id_kelas }}</h4>
                    </div>
                    @if (auth()->user()->role == 'admin')
                        <button class="btn" data-toggle="modal" data-target="#form"
                            onclick="location.href='{{ route('main.edit_kelas', $id) }}';"><i
                                class="nc-icon nc-simple-add">Tambah Data</i></button>
                                <form action="{{ route('cetak_detailkelas' , $kelas->id) }}"
                                    class="login-form">
                                    <button type="submit"
                                        class="btn form-control btn-primary rounded submit px-3">Cetak Pdf</button>
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
                                        Nim
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($kelas->mahasiswa as $kelasa)
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (auth()->user()->role == 'admin')
                                <form action="{{ route('main.table_kelas') }}" class="login-form">
                                    <button type="submit"
                                        class="btn form-control btn-primary rounded submit px-3">Kembali</button>
                                </form>
                            @elseif (auth()->user()->role == 'dosen')
                                <form action="{{ route('dosen.kelas') }}" class="login-form">
                                    <button type="submit"
                                        class="btn form-control btn-primary rounded submit px-3">Kembali</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('main.footer')
@endsection
