<html>
	<head>
		<!-- Custom Fonts -->
		<link href="./assets/js/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Bootstrap Core CSS -->
		<link href="./assets/js/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			body {
			  background-color:#ddd;
			  -webkit-font-smoothing: antialiased;
			  font: normal 14px Roboto,arial,sans-serif;
			}

			.container {
				padding: 25px;
			}

			.panel-heading{
				text-align: center;
		

		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3>TES SKALA KOMPETENSI KARIR SISWA SMP</h3>
							<p>Tim Pengembang :</p>
							<p>Dr. Gantina Komalasari, M.P.Si</p>
							<p>Herdi, M.Pd</p>
						</div>
						<div class="panel-body">
							<?php $msg = get_flashmessage(); if( !empty($msg) ): ?>
								<div class="panel panel-<?php echo ( $msg['status']==false )?'danger':'success' ?>" id="message">
									<div class="panel-heading"><?php echo $msg['title'] ?></div>
									<div class="panel-body text-center"><p><?php echo $msg['message'] ?></p></div>
								</div>
							<?php endif; ?>
								<p><strong>Petunjuk Pengisian</strong></p>
								<ol>
									<li><p>Para peserta didik yang baik hati, ke hadapan Anda disajikan 43 butir pernyataan. Anda diminta untuk memilih salah satu dari empat alternatif jawaban yang menurut Anda paling sesuai dengan diri Anda pada saat sekarang ini dengan cara menghitamkan. Alternatif jawaban yang disediakan, yaitu :</p>
									<ol type="a">
										<li><p>Sangat Sesuai jika pernyataan tersebut sangat sesuai dengan diri Anda.</p></li>
										<li><p>Sesuai jika pernyataan tersebut sesuai dengan diri Anda.</p></li>
										<li><p>Tidak Sesuai jika pernyataan tersebut tidak sesuai dengan diri Anda.</p></li>
										<li><p>Sangat Tidak Sesuai jika pernyataan tersebut sangat tidak sesuai dengan diri Anda.</p></li>
									</ol>
									</li>
									<li><p>Tidak ada jawaban benar atau salah. Anda tidak perlu merasa takut karena tidak akan berpengaruh pada nama baik dan nilai Anda pada mata pelajaran tertentu.</p></li>
									<li><p>Bekerjalah dengan cepat tetapi teliti. Isilah identitas secara lengkap. Selanjutnya, jawablah semua butir pernyataan pada lembar jawaban yang tersedia.</p></li>
									<li><p>Sebelum Anda menjawab pernyataan-pernyataan dalam instrumen ini, dipersilahkan berdo'a terlebih dahulu.</p></li>
									<li><p>Terima kasih atas kejujuran dan kesungguhan Anda dalam mengisi setiap butir pernyataan ini.</p></li>
								</ol>
						</div>
						<div class="panel-footer">
							<center>
								<button class="btn btn-success" data-toggle="modal" data-target="#form-login"> Masuk <i class="fa fa-arrow-right"></i> </button> &nbsp; 
								<button class="btn btn-success" data-toggle="modal" data-target="#form-signup">Daftar <i class="fa fa-user"></i> </button>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div id="form-login" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Login</h3>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<form method="post" class="form-horizontal">
									<input type="hidden" name="login" value="1" />
									<div class="form-group">
										<div class="col-md-12">
											<input type="text" name="username" class="form-control input-sm chat-input" placeholder="username" required />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="password" name="password" class="form-control input-sm chat-input" placeholder="password" required />
										</div>
									</div>
									<div class="form-group">	 
										<div class="col-md-12">
											<button class="btn btn-success btn-md pull-right">login <i class="fa fa-sign-in"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="form-signup" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Registrasi</h3>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<form method="post" class="form-horizontal">
									<input type="hidden" name="register" value="1" />
									<div class="form-group">
			                            <label class="col-md-3">NIS</label>
			                            <div class="col-md-5">
			                                <input type="text" name="nis" class="form-control" placeholder="NIS" required />
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-md-3">Nama</label>
			                            <div class="col-md-9">
			                                <input type="text" name="nama" class="form-control" placeholder="Nama" required />
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-md-3">Kelas</label>
			                            <div class="col-md-5">
			                                <input type="text" name="kelas" class="form-control" placeholder="Kelas" required />
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-md-3">Username</label>
			                            <div class="col-md-6">
			                                <input type="text" name="uname" class="form-control" placeholder="Username"  required />
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-md-3">Password</label>
			                            <div class="col-md-6">
			                                <input type="password" name="pwd1" class="form-control" placeholder="Password"  required />
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-md-3">Password lagi</label>
			                            <div class="col-md-6">
			                                <input type="password" name="pwd2" class="form-control" placeholder="Password lagi"  required />
			                            </div>
			                        </div>
			                        <div class="form-group">	 
										<div class="col-md-12">
											<button class="btn btn-success btn-md pull-right">Register <i class="fa fa-chevron-circle-right"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="./assets/js/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="./assets/js/bootstrap/dist/js/bootstrap.min.js"></script>

		<script type="text/javascript">
			function tutup() {
				setTimeout(function(){
					$('#message').fadeOut('slow');
				}, 3000);
			}

			tutup();
		</script>
	</body>
</html>