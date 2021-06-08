<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sistem Informasi Nilai Mahasiswa Polinema
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
  </svg>
</head>

<body style="background-image: url('{{ url('images/polinema.png') }}');">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{asset('assets/img/logo-small.png')}}">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="/main/edituser" class="simple-text logo-normal">
          HI,{{ $data->nama }}<br /> Login By
          {{ auth()->user()->role }}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ (request()->is('main/dashboard')) ? 'active' : '' }}">
            <a href="/main/dashboard">
              <i class="nc-icon nc-shop"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ (request()->is('main/table_mhs')) ? 'active' : '' }}">
            <a href="/main/table_mhs">
              <i class="nc-icon nc-bank"></i>
              @if(auth()->user()->role =='admin')
                  <p> Mahasiswa</p>
                @endif
            </a>
          </li>
          <li class="{{ (request()->is('main/table_kelas')) ? 'active' : '' }}">
            <a href="/main/table_kelas">
              <i class="nc-icon nc-bank"></i>
              @if(auth()->user()->role =='admin')
                  <p> Kelas </p>
                @endif
            </a>
          </li>
          <li class="{{ (request()->is('main/table_matakuliah')) ? 'active' : '' }}">
            <a href="/main/table_matakuliah">
              <i class="nc-icon nc-bank"></i>
              @if(auth()->user()->role =='admin')
                  <p> MataKuliah </p>
                @endif
            </a>
          </li>
          <li class="{{ (request()->is('main/table_dosen')) ? 'active' : '' }}">
            <a href="/main/table_dosen">
              <i class="nc-icon nc-bank"></i>
              @if(auth()->user()->role =='admin')
                  <p> Dosen </p>
                @endif
            </a>
          </li>
          <li class="{{ (request()->is('main/table_dosen_matakuliah')) ? 'active' : '' }}">
            <a href="/main/table_dosen_matakuliah">
              <i class="nc-icon nc-bank"></i>
              @if(auth()->user()->role =='admin')
                  <p> Pengajar </p>
                @endif
            </a>
          </li>
          <li class="{{ (request()->is('main/table_kelas_matakuliah')) ? 'active' : '' }}">
            <a href="/main/table_kelas_matakuliah">
              <i class="nc-icon nc-bank"></i>
              @if(auth()->user()->role =='admin')
                  <p> Pelajaran </p>
                @endif
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Sistem Informasi Penilaian Mahasiswa</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Fitur Akun</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" type="button" href="/main/edituser">Edit Profile</a>
                  <a class="dropdown-item" type="button" href="/main/gantipassword">Ganti Password</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    @yield('konten')
