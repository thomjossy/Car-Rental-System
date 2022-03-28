<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
        <div class="col-lg-5 col-md-8 py-8 py-xl-0">
            <!-- Card -->
            <div class="card shadow ">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
<!--                        <a href="../index-2.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4" alt=""></a>-->
                        <h1 class="mb-1 fw-bold">Sign in</h1>
                        <span>Don’t have an account? <a href="register.php" class="ms-1">Sign up</a></span>
                    </div>
                    <!-- Form -->
                    <form action=" " method="post">
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email address here"
                                   required>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="**************"
                                   required>
                        </div>
                        <!-- Checkbox -->
                        <div class="d-lg-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberme">
                                <label class="form-check-label " for="rememberme">Remember me</label>
                            </div>
                            <div>
                                <a href="forget-password.html">Forgot your password?</a>
                            </div>
                        </div>
                        <div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary ">Sign in</button>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="mt-4 text-center">
                            <!--Facebook-->
                            <a href="#" class="btn-social btn-social-outline btn-facebook">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <!--Twitter-->
                            <a href="#" class="btn-social btn-social-outline btn-twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <!--LinkedIn-->
                            <a href="#" class="btn-social btn-social-outline btn-linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <!--GitHub-->
                            <a href="#" class="btn-social btn-social-outline btn-github">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
