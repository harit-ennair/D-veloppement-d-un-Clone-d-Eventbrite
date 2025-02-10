<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="/Public/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="/Public/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="/Public/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="/Public/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="/Public/assets/css/pace.min.css" rel="stylesheet" />
	<script src="/Public/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="/Public/assets/css/app.css" rel="stylesheet">
	<link href="/Public/assets/css/icons.css" rel="stylesheet">
	<title>Dashtrans - Bootstrap5 Admin Template</title>
</head>

<body class="bg-theme bg-theme2" style="background-image: url(/Public/assets/images/bg-themes/4.png);" >
<!-- wrapper -->
<div class="wrapper">
		<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card forgot-box">
				<div class="card-body">
					<div class="p-3">
						<div class="text-center">
							<img src="/Public/assets/images/icons/forgot-2.png" width="100" alt="" />
						</div>
						<h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
						<p class="mb-0">Enter your registered email ID to reset the password</p>
						<div class="my-4">
							<label class="form-label">Email id</label>
							<input type="text" class="form-control" placeholder="example@user.com" />
						</div>
						<div class="d-grid gap-2">
							<button type="button" class="btn btn-white">Send</button>
							 <a href="login.php" class="btn btn-light"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
<!-- Bootstrap JS -->
<script src="/Public/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="/Public/assets/js/jquery.min.js"></script>
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