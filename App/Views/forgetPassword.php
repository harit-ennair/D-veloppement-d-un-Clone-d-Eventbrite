<?php include_once $_SERVER['DOCUMENT_ROOT']."/App/Views/layoutDashboard/header.php"?>
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
	 <?php include_once $_SERVER['DOCUMENT_ROOT']."/App/Views/layoutDashboard/footer.php"?>