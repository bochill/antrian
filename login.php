<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome.min.css">
	<title>LOGIN ANTRI</title>
</head>
<body>
	<div class="container-fluid" style="margin-top: 50px;">
		<div class="row">
			<div class="col-md-5 offset-md-3">
				<div class="card">
					<div class="card-body">
						<label>LOGIN</label>
						<hr>
						<div class="form-group">
							<label>username</label>
							<input type="text" id="username" class="form-control">
						</div>
						<div class="form-group">
							<label>password</label>
							<input type="password" id="password" class="form-control">
						</div>
						<button class="btn btn-login btn-block btn-success">masuk</button>
					</div>
				</div>
			</div>
		</div>		
	</div>
</body>
<script type="text/javascript" src="./assets/js/vendor/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="./assets/js/popper.min.js"></script>
<script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".btn-login").click(function(){
			var username = $("#username").val();
			var password = $("#password").val();

			if(username.length == ""){
				Swal.fire({
					type: "warning",
					title: "Oops...",
					text: "Username wajib diisi !",
				});
			} else if(password.length == ""){
				Swal.fire({
					type: "warning",
					title: "Oops...",
					text: "Password wajib diisi !",
				});
			} else {
				$.ajax({
					url: "cek-login.php",
					type: "POST",
					data: {
						"username": username,
						"password": password
					},
					success: function(response){
						if(response == "success"){
							Swal.fire({
								icon: "success",
								type: "success",
								title: "Login sukses",
								// text: "Anda akan diarahkan dalam 3 detik",
								timer: 1500,
								showCancelButton: false,
								showConfirmButton: false
							}).then(function(){
								window.location.href = "panel.php"	
							});
						} else {
							Swal.fire({
								type: "error",
								title: "Login gagal !",
								text: "Silahkan coba lagi"
							});
						}
						console.log(response);
					},
					error: function(response){
						Swal.fire({
							type: "error",
							title: "Oops..",
							text: "server error",
						});
						console.log(response);
					}
				});
			}
		});
	});
</script>
</html>