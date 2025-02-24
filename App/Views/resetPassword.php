<?php include_once 'layoutDashboard/header.php'?>
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
                                    <img src="assets/images/logo-icon.png" width="60" alt="" />
                                </div>
                                <div class="text-start mb-4">
                                    <h5>Generate New Password</h5>
                                    <p class="mb-0">Please enter your new password!</p>
                                </div>
                                
                                <?php
                                // Display error/success messages
                                if (isset($_SESSION['error'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                                    unset($_SESSION['error']);
                                }
                                if (isset($_SESSION['success'])) {
                                    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                                    unset($_SESSION['success']);
                                }
                                ?>
                                
                                <form method="POST" action="/resetPassword">
                                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>">
                                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
                                    
                                    <div class="mb-3 mt-4">
                                        <label class="form-label">New Password</label>
                                        <input type="password" 
                                               name="password" 
                                               class="form-control" 
                                               placeholder="Enter new password" 
                                               required 
                                               minlength="8" />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" 
                                               name="confirm_password" 
                                               class="form-control" 
                                               placeholder="Confirm password" 
                                               required 
                                               minlength="8" />
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                        <a href="login.php" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'layoutDashboard/footer.php'?>