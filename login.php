<?php
require_once('config/connect.php');
require_once('functions/functions.php');


if (isset($_SESSION['log'])) {
	gotoPage("dashboard");
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login ESUT Filing Management System</title>
	<meta name="keywords" content="WebSite Template" />
	<meta name="description" content="Porto - Multipurpose Website Template">
	<meta name="author" content="okler.net">

	<?php require_once('includes/head.php') ?>
</head>

<body data-plugin-page-transition>

	<div class="body">
		<?php require_once('includes/header.php') ?>

		<div role="main" class="main">

			<section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
				<div class="container">
					<div class="row">
						<div class="col-md-12 align-self-center p-static order-2 text-center">
							<h1 class="font-weight-bold text-dark">Login</h1>
						</div>
						<div class="col-md-12 align-self-center order-1">
							<ul class="breadcrumb d-block text-center">
								<li><a href="#">Home</a></li>
								<li class="active">Pages</li>
							</ul>
						</div>
					</div>
				</div>
			</section>

			<div class="container py-4">

				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
						<h2 class="font-weight-bold text-5 mb-0">Login</h2>
						<form action="https://www.okler.net/" id="frmSignIn" method="post" class="needs-validation">
							<div class="row">
								<div class="form-group col">
									<label class="form-label text-color-dark text-3">Email address <span class="text-color-danger">*</span></label>
									<input id="login_email" required onkeyup="checkIfAllFormFieldsFilled('login_button',getInputValuesAndReturnTheirContentAsJson(['login_email', 'login_password']))" value="<?php if (isset($_COOKIE['client_mail'])) {
																																																					echo $_COOKIE['client_mail'];
																																																				} ?>" type="text" value="" class="form-control form-control-lg text-4" required>
								</div>
							</div>
							<div class="row">
								<div class="form-group col">
									<label class="form-label text-color-dark text-3">Password <span class="text-color-danger">*</span></label>
									<input id="login_password" onkeyup="checkIfAllFormFieldsFilled('login_button',getInputValuesAndReturnTheirContentAsJson(['login_email', 'login_password']))" value="<?php if (isset($_COOKIE['client_password'])) {
																																																			echo $_COOKIE['client_password'];
																																																		} ?>" id="login_password" type="password" value="" class="form-control form-control-lg text-4" required>
								</div>
							</div>
							<div class="row justify-content-between">
								<div class="form-group col-md-auto">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="login_remember_me">
										<label class="form-label custom-control-label cur-pointer text-2" for="rememberme">Remember Me</label>
									</div>
								</div>
								<div class="form-group col-md-auto">
									<a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2" href="#">Forgot Password?</a>
								</div>
							</div>
							<div class="row">
								<div class="form-group col">
									<button id="login_button" type="button" onclick="processLoginAjaxPostRequest('functions/loginAjax.php', getInputValuesAndReturnTheirContentAsJson(['login_email', 'login_password', 'login_remember_me']))" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Login</button>
									<!-- <div class="divider">
										<span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">or</span>
									</div>
									<a href="#" class="btn btn-primary-scale-2 btn-modern w-100 text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading..."><i class="fab fa-facebook text-5 me-2"></i> Login
										With Facebook</a> -->
								</div>
							</div>
						</form>
					</div>
					<!-- <div class="col-md-6 col-lg-5">
						<h2 class="font-weight-bold text-5 mb-0">Register</h2>
						<form action="https://www.okler.net/" id="frmSignUp" method="post">
							<div class="row">
								<div class="form-group col">
									<label class="form-label text-color-dark text-3">Username or email address <span class="text-color-danger">*</span></label>
									<input type="text" value="" class="form-control form-control-lg text-4" required>
								</div>
							</div>
							<div class="row">
								<div class="form-group col">
									<label class="form-label text-color-dark text-3">Password <span class="text-color-danger">*</span></label>
									<input type="password" value="" class="form-control form-control-lg text-4" required>
								</div>
							</div>
							<div class="row">
								<div class="form-group col">
									<p class="text-2 mb-2">Your personal data will be used to support your experience
										throughout this website, to manage access to your account, and for other
										purposes described in our <a href="#" class="text-decoration-none">privacy
											policy.</a></p>
								</div>
							</div>
							<div class="row">
								<div class="form-group col">
									<button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Register</button>
								</div>
							</div>
						</form>
					</div> -->
				</div>

			</div>

		</div>


		<?php require_once('includes/footer.php') ?>

	</div>



	<?php require_once('includes/js_imports.php') ?>

	<!-- Vendor -->
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="vendor/plugins/js/plugins.min.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="js/theme.js"></script>

	<!-- Theme Initialization Files -->
	<script src="js/theme.init.js"></script>

</body>

<!-- Mirrored from www.okler.net/previews/porto/9.9.0/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Nov 2022 22:10:04 GMT -->

</html>