<?php require_once('views/web/layouts/index.php'); ?>



<?php startblock('content') ?>

<div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Create New Account</h3>
                    </div>

                    <form class="mt-3 review-form-box" method="POST" action="<?php echo url('auth/handleRegister') ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mb-0">Full Name</label>
                                <input type="text" class="form-control" id="name" name="fullname" placeholder="Full Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="Email" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="Email" name="email" placeholder="Email" value=""> </div>
                                <div class="form-group col-md-6">
                                <label for="phone" class="mb-0">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone_number" placeholder="Phone number"> </div>
                            <div class="form-group col-md-6">
                                <label for="Address" class="mb-0">Address</label>
                                <input type="text" class="form-control" id="Address" name="address" placeholder="Enter Address"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword1" name="password" placeholder="Password"> </div>
                                <div class="form-group col-md-6">
                                <label for="InputPassword2" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword2" name="password_confirm" placeholder="Password Confirm"> </div>
                            </div>

                        <button type="submit" class="btn hvr-hover" name="register">Register</button>
                    </form>
                </div>

<?php endblock() ?>