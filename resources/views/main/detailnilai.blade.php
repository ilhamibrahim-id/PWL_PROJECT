@extends('main.header')
@section('konten')
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Detail Nilai {{ $kelas->nim }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      Kelas
                    </th>
                    <th>
                      Mata Kuliah
                    </th>
                    <th>
                      Dosen
                    </th>
                    <th>
                        Sks
                    </th>
                    <th>
                      Nilai
                    </th>
                  </thead>
                  <tbody>
                    @foreach ($kelas->matakuliah as $kelasa)
                    <tr>
                      <td>
                        {{ $kelas->kelas->id_kelas }}
                      </td>
                      <td>
                        {{ $kelasa->nama_mk }}
                      </td>
                      <td>
                        {{ $kelass->nama }}
                      </td>
                      <td>
                        {{ $kelasa->sks }}
                      </td>
                      <td>
                        {{ $kelasa->pivot->nilai }}
                      <td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <form action="{{ route('main.table_mhs') }}" class="login-form">
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
