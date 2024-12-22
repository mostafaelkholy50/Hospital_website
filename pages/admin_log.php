<?php
include "../share/head.php";
?>
<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                        </div>

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <?php if (isset($_SESSION['error'])): ?>
                                        <div class="alert alert-danger  w-100 p-3" role="alert">
                                            <?php echo $_SESSION['error'] ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php unset($_SESSION['error']); ?>
                                    <?php endif; ?>
                                    <h5 class="card-title text-center pb-0 fs-4">Admin Login Account</h5>
                                    <p class="text-center small">Enter your email & password to login</p>
                                </div>
                                <form class="row g-3 needs-validation" action="<?= url('controller/admin_log.php') ?>" method="post">

                                    <div class="col-12">
                                        <label for="email" class="form-label">FullName</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="FullName" class="form-control" id="yourUseremail" required>
                                            <div class="invalid-feedback">Please enter your FullName.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="Email" class="form-control" id="yourUseremail" required>
                                            <div class="invalid-feedback">Please enter your email.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourpassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourpassword" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" name="send" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Don't have an account? <a href="<?= url("pages/register.php") ?>">Create an account</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

    </div>
</main><!-- End #main -->

<?php
include "../share/footer.php";
?>