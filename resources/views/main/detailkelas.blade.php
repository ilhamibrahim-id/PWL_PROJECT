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
                <form action="{{ route('main.table_kelas') }}" class="login-form">
                <button type="submit" class="btn form-control btn-primary rounded submit px-3">Kembali</button>
                </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@include('main.footer')
@endsection
