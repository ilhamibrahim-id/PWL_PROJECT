@extends('daftar.header')
@section('konten')
<body style="background-image: url('{{url('images/polinema.png')}}');">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
                        <h3 class="text-center mb-0">Sistem Informasi Nilai Mahasiswa</h3>
		      	        <div class="img d-flex align-items-center justify-content-center" style="background-image: url('{{url('images/polinema.png')}}');"></div>
		      	            <p class="text-center">Daftar Sebagai Admin </p>
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
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-buysellads"></span></div>
                          <input type="text" class="form-control" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-blind"></span></div>
                          <input type="text" class="form-control" placeholder="Masukan Jabatan" required>
                        </div>
                           <div class="form-group">
                              <button type="submit" class="btn form-control btn-primary rounded submit px-3">Daftar</button>
                          </div>
                        </form>
                        <div class="w-100 text-center mt-4 text">
                            <a href="{{url('/login/admin')}}" class="btn btn-info btn-lg">
                                <span class="glyphicon glyphicon-chevron-left"></span> Kembali
                              </a>
                              <a href="{{url('/')}}" class="btn btn-info btn-lg">
                                <span class="glyphicon glyphicon-home"></span> Halaman Utama
                              </a>
                        </div>
                        </div>
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
