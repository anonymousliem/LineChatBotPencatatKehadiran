


<!DOCTYPE html>
<html lang="en">
<head>
	<title>REGISTER</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="proses_register.php">
					<span class="login100-form-title p-b-32">
						REGISTER Event
					</span>
				<span class="txt1 p-b-11">
						Nama
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="nama" >
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Nim
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="nim" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Gender
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
					<select name="gender" class="input100">
 					 <option value=""></option>
  					 <option value="Laki-laki">Laki-laki</option>
					   <option value="Perempuan">Perempuan</option>
					</select>
						
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Institusi
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="institusi" >
						<span class="focus-input100"></span>
					</div>
					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="email" name="email" >
						<span class="focus-input100"></span>
					</div>

					
						<input class="input100" type="submit" value="DAFTAR">
							
						
		
						<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							
						<!--	<label  for="ckb1">
								<centre>Sudah Punya Akun? Klik <b><a href="../login/index.php">Di sini </a></b></centre>
							</label> -->
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>