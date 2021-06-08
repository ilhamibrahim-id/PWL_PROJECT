@extends('main.header')
@section('konten')

<div class="content">
    <div class="row">
          <div class="col-md-12">
              <center>
                <div class="alert alert-success" role="alert">
                <p>Profile Telah Diperbarui <a href="/main/edituser" style="color:red"> Cek Profile </a></p>
            </div>
            <img src="{{asset('assets/img/sukses.png')}}" width="300px">
              </center>
          </div>
    </div>
</div>
@include('main.footer')
@endsection
