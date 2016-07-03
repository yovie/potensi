<html>
	<head>
		<!-- Custom Fonts -->
    	<link href="./assets/js/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Bootstrap Core CSS -->
    	<link href="./assets/js/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			@import url(http://fonts.googleapis.com/css?family=Roboto:400);
			body {
			  background-color:#fff;
			  -webkit-font-smoothing: antialiased;
			  font: normal 14px Roboto,arial,sans-serif;
			}

			.container {
			    padding: 25px;
			    position: fixed;
			}

			.form-login {
			    background-color: #EDEDED;
			    padding-top: 10px;
			    padding-bottom: 20px;
			    padding-left: 20px;
			    padding-right: 20px;
			    border-radius: 15px;
			    border-color:#d2d2d2;
			    border-width: 5px;
			    box-shadow:0 1px 0 #cfcfcf;
			}

			h4 { 
			 border:0 solid #fff; 
			 border-bottom-width:1px;
			 padding-bottom:10px;
			 text-align: center;
			}

			.form-control {
			    border-radius: 10px;
			}

			.wrapper {
			    text-align: center;
			}

		</style>
	</head>
	<body>
		<div class="container">
		    <div class="row">
		        <div class="col-md-offset-5 col-md-3">
		            <div class="form-login">
		            <h4>Silakan login</h4>
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