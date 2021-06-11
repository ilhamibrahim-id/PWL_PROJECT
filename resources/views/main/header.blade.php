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
</head>

<body style="background-image: url('{{ url('images/polinema.png') }}');">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="https://www.creative-tim.com" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="{{ asset('assets/img/logo-small.png') }}">
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
                    <li class="{{ request()->is('main/dashboard') ? 'active' : '' }}">
                        <a href="/main/dashboard">
                            <i class="nc-icon nc-shop"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'mahasiswa')
                        <li class="{{ request()->is('main/table_mhs') || request()->is('main/mahasiswa/tambah') ? 'active' : ''}} ">
                            <a href="/main/table_mhs">
                                @if (auth()->user()->role == 'admin')
                                <i class="nc-icon nc-circle-10"></i>
                                    <p> Mahasiswa</p>
                                @endif
                                @if (auth()->user()->role == 'mahasiswa')
                                <i class="nc-icon nc-circle-10"></i>
                                    <p> Nilai</p>
                                @endif
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <li class="{{ request()->is('main/table_kelas') ? 'active' : '' }}">
                            <a href="/main/table_kelas">
                                <i class="nc-icon nc-bank"></i>
                                <p> Kelas </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <li class="{{ request()->is('main/table_matakuliah') || request()->is('main/matakuliah/tambah') ? 'active' : '' }}">
                            <a href="/main/table_matakuliah">
                                <i class="nc-icon nc-ruler-pencil"></i>
                                <p> MataKuliah </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <li class="{{ request()->is('main/table_dosen') || request()->is('main/dosen/tambah') ? 'active' : '' }}">
                            <a href="/main/table_dosen">
                                <i class="nc-icon nc-single-02"></i>
                                <p> Dosen </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <li class="{{ request()->is('main/table_dosen_matakuliah') || request()->is('main/dosen_mk/tambah') ? 'active' : '' }}">
                            <a href="/main/table_dosen_matakuliah">
                                <i class="nc-icon nc-glasses-2"></i>
                                <p> Pengajar </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <li class="{{ request()->is('main/table_kelas_matakuliah') || request()->is('main/pelajaran/tambah') ? 'active' : '' }}">
                            <a href="/main/table_kelas_matakuliah">
                                <i class="nc-icon nc-laptop"></i>
                                <p> Pelajaran </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'dosen')
                        <li class="{{ request()->is('dosen/kelas') ? 'active' : '' }}">
                            <a href="/dosen/kelas">
                                <i class="nc-icon nc-bank"></i>
                                <p> Kelas </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'dosen')
                        <li class="{{ request()->is('dosen/nilai') ? 'active' : '' }}">
                            <a href="/dosen/nilai">
                                <i class="nc-icon nc-bank"></i>
                                <p> Nilai </p>
                            </a>
                        </li>
                    @endif
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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-settings-gear-65"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Fitur Akun</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" type="button" href="/main/edituser">Edit Profile</a>
                                    <a class="dropdown-item" type="button" href="/main/gantipassword">Ganti Password</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('konten')
