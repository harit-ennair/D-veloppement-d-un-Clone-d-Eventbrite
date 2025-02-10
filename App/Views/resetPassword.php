<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="/public/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="/public/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="/public/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="/public/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="/public/assets/css/pace.min.css" rel="stylesheet" />
	<script src="/public/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="/public/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="/public/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="/public/assets/css/app.css" rel="stylesheet">
	<link href="/public/assets/css/icons.css" rel="stylesheet">
	<title>Dashtrans - Bootstrap5 Admin Template</title>
</head>

<body class="bg-theme bg-theme2" style="background-image: url(/public/assets/images/bg-themes/4.png);" >
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
		 <div class="container">
			<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
				<div class="col mx-auto">
					<div class="card">
						<div class="card-body">
							<div class="p-4">
								<div class="mb-4 text-center">
									<img src="/public/assets/images/logo-icon.png" width="60" alt="" />
								</div>
								<div class="text-start mb-4">
									<h5 class="">Genrate New Password</h5>
									<p class="mb-0">We received your reset password request. Please enter your new password!</p>
								</div>
								<div class="mb-3 mt-4">
									<label class="form-label">New Password</label>
									<input type="text" class="form-control" placeholder="Enter new password" />
								</div>
								<div class="mb-4">
									<label class="form-label">Confirm Password</label>
									<input type="text" class="form-control" placeholder="Confirm password" />
								</div>
								<div class="d-grid gap-2">
									<button type="button" class="btn btn-white">Change Password</button>
									<a href="login.php" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
	</div>
	<!-- end wrapper -->
<!-- Bootstrap JS -->
<script src="/public/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="/public/assets/js/jquery.min.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	
	
	<script>

	</script>


</body>

</html>