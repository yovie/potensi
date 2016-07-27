<html>
	<head>
		<!-- Custom Fonts -->
		<link href="./assets/js/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Bootstrap Core CSS -->
		<link href="./assets/js/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			@import url(http://fonts.googleapis.com/css?family=Roboto:400);
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
			}

		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3>Tes Kompetensi Karir</h3>
							<h3>Peserta Didik</h3>
							<h3>Sekolah Menengah Pertama</h3>
						</div>
						<div class="panel-body">
							<p>Ketentuan pengisian kuisioner :</p>
						</div>
						<div class="panel-footer">
							<center>
								<button class="btn btn-success">Masuk</button> &nbsp; 
								<button class="btn btn-success">Daftar</button>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div id="form-login" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Login</h3>
					</div>
					<div class="modal-body">
						<form method="post">
							<input type="text" name="username" class="form-control input-sm chat-input" placeholder="username" />
							</br>
							<input type="password" name="password" class="form-control input-sm chat-input" placeholder="password" />
							</br>
							<div class="wrapper">
							<span class="group-btn">	 
								<button class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></button>
							</span>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div id="form-signup" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Modal Header</h3>
					</div>
					<div class="modal-body">
						<p>Some text in the modal.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="./assets/js/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="./assets/js/bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
</html>