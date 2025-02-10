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
<!--wrapper-->
<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
										<img src="/Public/assets1/images/favicons/android-chrome-192x192.png" width="60" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">EventFlow</h5>
										<p class="mb-0">Please fill the below details to create your account</p>
									</div>
									<div class="form-body">
										<form class="row g-3">
											<div class="col-12">
												<label for="inputUsername" class="form-label">Username</label>
												<input type="email" class="form-control" id="inputUsername" placeholder="Jhon">
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">Country</label>
												<select class="form-select" id="inputSelectCountry" aria-label="Default select example">
													<option selected>Choose Your Role</option>
													<option value="1">organizer</option>
													<option value="2">participant</option>
												</select>
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-light">Sign up</button>
												</div>
											</div>
											<div class="col-12">
												<div class="text-center ">
													<p class="mb-0">Already have an account? <a href="login.php">Sign in here</a></p>
												</div>
											</div>
										</form>
									</div>
									<div class="login-separater text-center mb-5"> <span>OR SIGN UP WITH EMAIL</span>
										<hr/>
									</div>
									<div class="list-inline contacts-social text-center">
										<a href="javascript:;" class="list-inline-item bg-light text-white border-0 rounded-3"><i class="bx bxl-facebook"></i></a>
										<a href="javascript:;" class="list-inline-item bg-light text-white border-0 rounded-3"><i class="bx bxl-twitter"></i></a>
										<a href="javascript:;" class="list-inline-item bg-light text-white border-0 rounded-3"><i class="bx bxl-google"></i></a>
										<a href="javascript:;" class="list-inline-item bg-light text-white border-0 rounded-3"><i class="bx bxl-linkedin"></i></a>
									</div>

								</div>
							</div>
						</div>
					</div>
				 </div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
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