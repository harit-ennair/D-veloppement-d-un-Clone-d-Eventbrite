<?php include_once 'layoutDashboard/header.php';
print_r($_SESSION);
?>
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
										<img src="assets1/images/favicons/android-chrome-192x192.png" width="60" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">EventFlow</h5>
										<p class="mb-0">Please fill the below details to create your account</p>
									</div>
									<div class="form-body">
										<form class="row g-3" method="POST">
											<div class="col-12">
												<label for="inputUsername" class="form-label">Username</label>
												<input type="text" class="form-control" name="name" value="<?=$this->session->get("old","name")?>" id="inputUsername" placeholder="Jhon">
												<h1 style="color:red;font-size: 15px;"><?=$this->session->get("error","name")?></h1>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control" name="email" value="<?=$this->session->get("old","email")?>" id="inputEmailAddress" placeholder="example@user.com">
												<h1 style="color:red;font-size: 15px;"><?=$this->session->get("error","email")?></h1>

											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" value="" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
													
												</div>
												<h1 style="color:red;font-size: 15px;"><?=$this->session->get("error","password")?></h1>
											</div>
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">Country</label>
												<select class="form-select" name="role" id="inputSelectCountry" aria-label="Default select example">
													<option selected value="">Choose Your Role</option>
			
													<option value="organizer" <?=$this->session->get('old','role')==='organizer'?'selected':''?>>organizer</option>
													<option value="participant" <?=$this->session->get('old','role')==='participant'?'selected':''?>>participant</option>
												</select>
												<h1 style="color:red;font-size: 15px;"><?= $this->session->get("error","role")?></h1>
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="submit" class="btn btn-light">Sign up</button>
												</div>
											</div>
											<div class="col-12">
												<div class="text-center ">
													<p class="mb-0">Already have an account? <a href="/logIn">Sign in here</a></p>
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
<?php include_once 'layoutDashboard/footer.php';
$this->session->remove("error");
$this->session->remove("old");
?>