@extends('main.header')
@section('konten')
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-user">
            <div class="image">
              <img src="../assets/img/damir-bosnjak.jpg" alt="...">
            </div>
            <div class="card-body">
              <div class="author">
                <a href="#">
                  <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
                  <h5 class="title">{{ $data->nama }}</h5>
                </a>
                <p class="description">
                  @if(auth()->user()->role == 'dosen')
                    {{ $data->nip }}
                  @elseif(auth()->user()->role == 'mahasiswa')
                    {{ $data->nim }}
                  @elseif(auth()->user()->role == 'admin')
                    {{ $data->username }}
                  @endif
                </p>
              </div>
              <p class="description text-center">
                    @if(auth()->user()->role == 'dosen' || auth()->user()->role == 'mahasiswa')
                    {{ $data->alamat }}
                  @elseif(auth()->user()->role == 'admin')
                    {{ $data->jabatan }}
                  @endif
              </p>
            </div>
            <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form action="{{url('/main/edituser/update')}}" method="post"
                        enctype="multipart/form-data">
                         @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        @if(auth()->user()->role == 'admin')
                          <label>Username</label>
                          <input type="text" class="form-control" placeholder="username" value="{{$data->username}}">
                        @endif
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                          @if(auth()->user()->role == 'admin')
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="username" value="{{$data->nama}}">
                          @endif
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                          @if(auth()->user()->role == 'admin')
                            <label>Jabatan</label>
                            <input type="text" class="form-control" placeholder="jabatan" value="{{ $data->jabatan }}">
                          @endif
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                          @if(auth()->user()->role == 'admin')
                          <div class="form-group">
                            <label for="image">foto</label>

                            </div>

                          @endif
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round" value="simpan">Update Profile</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
@include('main.footer')
@endsection
