@extends('login.header')
@section('konten')
<body style="background-image: url('{{url('img/background.png')}}');">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
                        <h3 class="text-center mb-0">Sistem Informasi Nilai Mahasiswa</h3>
		      	        <div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/polinema.png);"></div>
		      	            <h3 class="text-center mb-0">Selamat Datang</h3>
		      	            <p class="text-center">Login Sebagai : </p>
                            <center>
                            <tr>
                            <td><a href="{{url('login/dosen')}}"><button type="button" class="btn btn-primary">Dosen</button></a></td><td>&nbsp;&nbsp;</td>
                            <td><a href="{{url('login/admin')}}"><button type="button" class="btn btn-primary">Admin</button></a></td><td>&nbsp;&nbsp;</td>
                            <td><a href="{{url('login/mahasiswa')}}"><button type="button" class="btn btn-primary">Mahasiswa</button></a></td>
                            </tr>
                            </center>
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

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
@endsection
