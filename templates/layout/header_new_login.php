<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Skala Kompetensi Karir Siswa SMP</title>

    <link rel="icon" href="unj.png" type="image/x-icon" />

    <!-- Bootstrap Core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./assets/css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./assets/js/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container" style="background:#000;border-radius:10px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <img src="unj.png" width="30px" style="float:left;margin:-5px 10px 0 0;" />  <span class="light"></span> SKALA KOMPETENSI KARIR SISWA SMP
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about" >Tim</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading" style="font-size:30pt;">Selamat Datang</h1>
                        <p class="intro-text">di<br/>Aplikasi Skala Kompetensi Karir Siswa SMP</p>
                        <!--<a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a> -->
                    </div>
                    <div class="col-md-12">
                    	<br/>
                    	<br/>
                    	<br/>
                    	<button class="col-md-2 col-md-offset-3 btn btn-success btn-lg"  data-toggle="modal" data-target="#form-signup">Register</button>
                        <button class="col-md-2 col-md-offset-2 btn btn-success btn-lg" data-toggle="modal" data-target="#form-login">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Tim Pengembang</h2>
                <p>Dr. Gantina Komalasari, M.P.Si</p>
				<p>Herdi, M.Pd</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Kontak</h2>
                <p>kontak1@gmail.com</p>
                <p>kontak2@gmail.com</p>
                <p>kontak3@gmail.com</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
        </div>
    </footer>

    <!-- jQuery -->
    <script src="./assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="./assets/js/jquery.easing.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./assets/js/grayscale.js"></script>

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
			                            <label class="col-md-3" style="color:#555;">NIS</label>
			                            <div class="col-md-5">
			                                <input type="text" name="nis" class="form-control" placeholder="NIS" required />
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-md-3"  style="color:#555;">Nama</label>
			                            <div class="col-md-9">
			                                <input type="text" name="nama" class="form-control" placeholder="Nama" required />
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-md-3"  style="color:#555;">Jenis Kelamin</label>
			                            <div class="col-md-5">
			                                <select name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" required>
			                                	<option value="Laki-laki">Laki-laki</option>
			                                	<option value="Perempuan">Perempuan</option>
			                                </select>
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-md-3"  style="color:#555;">Kelas</label>
			                            <div class="col-md-5">
			                                <input type="text" name="kelas" class="form-control" placeholder="Kelas" required />
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-md-3" style="color:#555;">Username</label>
			                            <div class="col-md-6">
			                                <input type="text" name="uname" class="form-control" placeholder="Username"  required />
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-md-3" style="color:#555;">Password</label>
			                            <div class="col-md-6">
			                                <input type="password" name="pwd1" class="form-control" placeholder="Password"  required />
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label class="col-md-3" style="color:#555;">Password lagi</label>
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

	<script type="text/javascript">
			function tutup() {
				setTimeout(function(){
					$('#message').fadeOut('slow');
				}, 3000);
			}

			$('#form-login').on('shown.bs.modal', function (e) {
			    $('input[name=username]').focus();
			} );

			$('#form-signup').on('shown.bs.modal', function (e) {
			    $('input[name=nis]').focus();
			} );

			tutup();
	</script>

</body>

</html>
