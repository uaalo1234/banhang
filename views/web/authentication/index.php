<?php include('views/web/layouts/index.php') ?>


<?php startblock('content') ?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<?php //echo Flash::get('signin_error');?>
						<h2>Login to your account</h2>
							<?php if (Flash::has('signin_error')): ?>
							<div class="alert alert-danger" role="alert">
								<?php echo Flash::get('signin_error') ?>
							</div>
							<?php endif ?>
						
						<form action="<?php echo url('authentication/login')?>" method="POST">
							<input type="email" placeholder="Email" name="email">
							<input type="password" placeholder="Password" name="password">
							<span>
								<input type="checkbox" class="checkbox" name="remember_me"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
					<?php if (Flash::has('signup_error')): ?>
						<div class="alert alert-danger" role="alert">
							<?php echo Flash::get('signup_error') ?>
						</div>
					<?php endif ?>
						<h2>New User Signup!</h2>
						<form action="<?php echo url('authentication/signup')?>" method="POST">
							<input type="text" placeholder="Name" name="name">
							<input type="email" placeholder="Email Address" name="email">
							<input type="password" placeholder="Password" name="password">
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section>
<?php endblock() ?>