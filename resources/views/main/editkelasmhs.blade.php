@extends('main.header')
@section('konten')
    <!-- End Navbar -->
    <div class="content">
      <div class="row">
            <div class="col-md-12">
          <div class="card card-user">
            <div class="card-header">
              <h5 class="card-title">Edit Data Mahasiswa</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('main.update_kelas',$id) }}" class="login-form" method="POST">
                @csrf
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          Nim
                      </th>
                      <th>
                          Activate
                      </th>
                    </thead>
                    <tbody>
                      @foreach ($kelas as $kelasa)
                      <tr>
                        <td>
                          {{ $kelasa->nim }}
                        </td>
                        <td>
                          @if ($kelasa->kelas_id == null)
                            <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox[]" value="{{ $kelasa->nim }}">
                          @else
                            <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox[]" value="{{ $kelasa->nim }}" checked>
                          @endif
                        @endforeach
                    </tbody>
                  </table>
                  {{ $kelas->render("pagination::bootstrap-4") }}
                </div>
                <div class="row">
                    <button type="submit" class="btn form-control btn-primary rounded submit px-3">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@include('main.footer')
@endsection
