@extends('main.header')
@section('konten')

<div class="content">
    <div class="row">
          <div class="col-md-12">
                <div class="card">
                    <center>
                <p>Profile Telah Diperbarui <a href="/main/edituser" style="color:red"> Cek Profile </a></p>
                <img src="{{asset('assets/img/sukses.png')}}" width="300px">
                <br /> &nbsp;
            </center>
            </div>
          </div>
    </div>
</div>
@include('main.footer')
@endsection
