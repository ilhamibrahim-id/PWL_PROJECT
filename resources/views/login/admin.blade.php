@extends('login.header')
@section('konten')
<body style="background-image: url('{{url('images/polinema.png')}}');">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
                        <h3 class="text-center mb-0">Sistem Informasi Nilai Mahasiswa</h3>
		      	        <div class="img d-flex align-items-center justify-content-center" style="background-image: url('{{url('images/polinema.png')}}');"></div>
		      	            <p class="text-center">Login Sebagai Admin </p>
                              <form action="#" class="login-form">
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                                    <input type="text" class="form-control" placeholder="Masukan Username" required>
                                </div>
                          <div class="form-group">
                              <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                            <input type="password" class="form-control" placeholder="Masukan Password" required>
                          </div>
                           <div class="form-group">
                              <button type="submit" class="btn form-control btn-primary rounded submit px-3">Login</button>
                          </div>
                        </form>
                        <div class="w-100 text-center mt-4 text">
                            <p class="mb-0">Tidak Punya Akun ?</p>
                            <a href="{{url('/daftar/admin')}}">Daftar Disini</a><br /><br />
                            <a href="{{url('/')}}" class="btn btn-info btn-lg">
                                <span class="glyphicon glyphicon-chevron-left"></span> Kembali
                              </a>
                        </div>
                        </div>
                        <footer class="bg-light text-center text-lg-start">
                            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                              © 2021 Copyright: Clan Anckerman
                            </div>
                          </footer>
				    </div>
			    </div>
		    </div>
	</section>

	<script src="{{url('js/jquery.min.js')}}"></script>
  <script src="{{url('js/popper.js')}}"></script>
  <script src="{{url('js/bootstrap.min.js')}}"></script>
  <script src="{{url('js/main.js')}}"></script>

	</body>
</html>
@endsection
