<?php
include "../share/head.php";
?>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-12 d-flex flex-column align-items-center justify-content-center">


                        <div class="d-flex justify-content-center py-4">
                        </div>
                        <div class="card shadow-sm border-primary">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4 text-primary">Create Your Hospital Account</h5>
                                    <p class="text-center small text-muted">Enter your personal details to register for hospital services.</p>
                                </div>

                                <form class="row g-3 needs-validation" action="<?= url("controller/register_user.php") ?>" method="post" enctype="multipart/form-data">
                                    <?php if (isset($_SESSION['error'])): ?>
                                        <div class="alert alert-danger  w-100 p-3" role="alert">
                                            <?php echo $_SESSION['error'] ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php unset($_SESSION['error']); ?>
                                    <?php endif; ?>

                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Your Full Name</label>
                                        <input type="text" name="FullName" class="form-control" id="yourName" required>
                                        <div class="invalid-feedback">Please enter your full name!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Your Email Address</label>
                                        <input type="email" name="Email" class="form-control" id="yourEmail" required>
                                        <div class="invalid-feedback">Please enter a valid email address!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label"> your DateOfBirth</label>
                                        <input type="date" name="DateOfBirth" class="form-control" id="yourEmail" required>
                                        <div class="invalid-feedback">Please enter your birth day</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label"> your Gender</label>
                                        <select  name="Gender" class="form-select" id="validationDefault04" required="">
                                            <option selected disabled>---SELECT YOUR GENDER---</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
            
                                    </div>

                                    <div class="col-12">
                                        <label for="youraddress" class="form-label">your address</label>
                                        <input type="text" name="Address" class="form-control" id="youraddress" required>
                                        <div class="invalid-feedback">Please create a address!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourphoneNumber" class="form-label">your phone Number</label>
                                        <input type="text" name="PhoneNumber" class="form-control" id="yourphoneNumber" required>
                                        <div class="invalid-feedback">Please create a phoneNumber!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourMedicalHistory" class="form-label">your MedicalHistory</label>
                                        <input type="text" name="MedicalHistory" class="form-control" id="yourMedicalHistory" required>
                                        <div class="invalid-feedback">Please create a MedicalHistory!</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="termsAndConditions">
                                            <label class="form-check-label" for="termsAndConditions">
                                                I agree to the <a href="#">Terms and Conditions</a> of the hospital.
                                            </label>
                                            <div class="invalid-feedback">You must agree to the terms and conditions.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" name="send" type="submit">Register for Hospital Services</button>
                                    </div>

                                    <div class="col-12">
                                        <p class="small mb-0 text-center">Already have an account? <a href="<?= url("pages/login.php") ?>">Log in here</a></p>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </section>

    </div>
</main>

<?php
include "../share/footer.php";
?>