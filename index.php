<?php
require_once('config/connect.php');
require_once('functions/functions.php');

if (isset($_SESSION['log'])) {
    gotoPage("dashboard");
}
?>

<!DOCTYPE html>
<html data-style-switcher-options="{'changeLogo': false, 'colorPrimary': '#e23c8e', 'colorSecondary': '#a33188', 'colorTertiary': '#4046b3', 'colorQuaternary': '#171940'}">


<head>
	<title>Home Page </title>
	<meta name="keywords" content="WebSite Template" />
	<meta name="description" content="Porto - Multipurpose Website Template">
	<meta name="author" content="okler.net">

	<?php require_once('includes/head.php') ?>

</head>

<body>

	<div class="body">
		<?php require_once('includes/header.php') ?>


		<div role="main" class="main">

			<section class="section custom-bg-color-light-1 border-0 pt-5 m-0">
				<div class="container position-relative z-index-1 pt-5 mt-5">
					<div class="custom-circle custom-circle-wrapper custom-circle-big custom-circle-pos-1 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="900" data-appear-animation-duration="2s">
						<div class="bg-color-tertiary rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 1000}"></div>
					</div>
					<div class="custom-circle custom-circle-medium custom-circle-pos-2 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1450" data-appear-animation-duration="2s">
						<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.2, 'transition': true, 'transitionDuration': 2000}"></div>
					</div>
					<div class="custom-circle custom-circle-medium custom-circle-pos-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="1300">
						<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.3, 'transition': true, 'transitionDuration': 1000}"></div>
					</div>
					<div class="custom-circle custom-circle-small custom-circle-pos-4 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="1600">
						<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.6, 'transition': true, 'transitionDuration': 500}"></div>
					</div>
					<div class="custom-circle custom-circle-medium custom-circle-pos-5 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1050" data-appear-animation-duration="2s">
						<div class="bg-color-secondary rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.2, 'transition': true, 'transitionDuration': 2000}"></div>
					</div>
					<div class="custom-circle custom-circle-medium custom-circle-pos-6 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1200" data-appear-animation-duration="2s">
						<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.8, 'transition': true, 'transitionDuration': 500}"></div>
					</div>
					<div class="custom-circle custom-circle-small custom-circle-pos-7 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="1700">
						<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.3, 'transition': true, 'transitionDuration': 1000}"></div>
					</div>
					<div class="custom-circle custom-circle-medium custom-circle-pos-8 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1350" data-appear-animation-duration="2s">
						<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 500}"></div>
					</div>
					<div class="row align-items-center pt-4">
						<div class="col-md-6 pb-5 mb-md-5">
							<div class="spacer" style="height: 110px;"></div>
							<h1 class="text-color-dark font-weight-bold text-10 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">E-Filing For Students</h1>
							<p class="custom-text-color-grey-1 text-4 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="450">The world has been completely computerized. The world is a global village. We should work now to maximize your productivity and visibility, getting better faster results is easy</p>
							<a href="login" class="btn btn-gradient btn-rounded font-weight-semibold px-5 py-3 text-3 mb-md-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">Get Started</a>
							<div class="spacer d-none d-md-block" style="height: 310px;"></div>
						</div>
						<div class="col-md-6 pb-5">
							<img src="img/demos/seo-2/concept-1.png" class="img-fluid position-relative z-index-1 pb-5 mb-5 ms-5 top-10 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-appear-animation-duration="1500ms" alt="Demo SEO 2" />
						</div>
					</div>
				</div>
			</section>

		</div>

		<?php require_once('includes/footer.php') ?>


	</div>
	<?php require_once('includes/js_imports.php') ?>


	<!-- Vendor -->
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="vendor/plugins/js/plugins.min.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="js/theme.js"></script>

	<!-- Demo -->
	<script src="js/demos/demo-seo-2.js"></script>

	<!-- Theme Initialization Files -->
	<script src="js/theme.init.js"></script>

</body>

</html>