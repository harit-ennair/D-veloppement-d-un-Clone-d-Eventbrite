<?php include_once 'layoutDashboard/header.php'?>
<!-- wrapper -->
<div class="wrapper">
    <div class="authentication-forgot d-flex align-items-center justify-content-center">
        <div class="card forgot-box">
            <div class="card-body">
                <div class="p-3">
                    <div class="text-center">
                        <img src="assets/images/icons/forgot-2.png" width="100" alt="" />
                    </div>
                    <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
                    <p class="text-muted mb-4">Enter your registered email ID to reset the password</p>
                    
                    <!-- Add success/error message display -->
                    <div id="messageBox" style="display: none;" class="alert"></div>
                    
                    <form id="showForgotForm" method="POST"  >
                        <div class="my-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="example@user.com" required />
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Send Reset Link</button>
                            <a href="login.php" class="btn btn-light"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
	<!-- end wrapper -->
<?php include_once 'layoutDashboard/footer.php'?>