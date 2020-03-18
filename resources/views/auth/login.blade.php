<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | JKGST</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util-loginstyle.css">
	<link rel="stylesheet" type="text/css" href="css/main-login.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div style="width:100%; text-align:center">
				<div class="col-md-12" style="clear:left; float:right">
					<h1>WEBSITE DATA JEMAAT<br>
						BNKP KOTA GUNUNGSITOLI<br><br>
					</h1>
				</div>
			</div>
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/img-01.png" alt="IMG">
				</div>
				
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf

					<span class="login100-form-title">
						<i class="fa fa-user fa-2x" aria-hidden="true"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Username harus diisi">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>

					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password harus diisi">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						
					</div>
					@error('username')
					<div class="text-center p-t-12">
						<span class="txt1" style="color:red">
							{{ $message }} 
						</span>
					</div>
					@enderror	
					@error('password')
						<div class="text-center p-t-12">
							<span class="txt1" style="color:red">
								{{ $message }} 
							</span>
						</div>
					@enderror
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-94">
						<span class="txt1">
						</span>
					</div>

				</form>
			</div>
		</div>
	</div>	
<!--===============================================================================================-->	
	<script src="js/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main-login.js"></script>
</body>
</html>