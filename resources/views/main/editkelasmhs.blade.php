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
              <form>
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
                            <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox">
                          @else
                            <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox" checked>
                          @endif
                          </td>
                        @endforeach
                    </tbody>
                  </table>
                  {{ $kelas->render("pagination::bootstrap-4") }}
                </div>
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary btn-round">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      function doit(checkboxElem) {
        if (checkboxElem.checked) {
          $kelas->update(['kelas_id'=>$id])
        } else {
          $kelas->update(['kelas_id'=>null])
        }
      }
    </script>
@include('main.footer')
@endsection
