<?php
require_once('config/connect.php');
require_once('functions/functions.php');
?>

<!DOCTYPE html>
<html data-style-switcher-options="{'changeLogo': false, 'colorPrimary': '#e23c8e', 'colorSecondary': '#a33188', 'colorTertiary': '#4046b3', 'colorQuaternary': '#171940'}">


<head>
	<title>Workshop ESUT Filing Management System</title>
	<meta name="keywords" content="WebSite Template" />
	<meta name="description" content="Porto - Multipurpose Website Template">
	<meta name="author" content="okler.net">

	<?php require_once('includes/head.php') ?>

</head>

<body>

	<div class="body">
		<?php require_once('includes/header.php') ?>


		<div role="main" class="main">

			<section class="page-header page-header-lg custom-bg-color-light-1 border-0 m-0">
				<div class="container position-relative pt-5 pb-4 mt-5">
					<div class="custom-circle custom-circle-wrapper custom-circle-big custom-circle-pos-1 custom-circle-pos-1-1 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="900" data-appear-animation-duration="2s">
						<div class="bg-color-tertiary rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 1000}">
						</div>
					</div>
					<div class="custom-circle custom-circle-medium custom-circle-pos-2 custom-circle-pos-2-2 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1450" data-appear-animation-duration="2s">
						<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.2, 'transition': true, 'transitionDuration': 2000}">
						</div>
					</div>
					<div class="custom-circle custom-circle-medium custom-circle-pos-3 custom-circle-pos-3-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="1300">
						<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.3, 'transition': true, 'transitionDuration': 1000}">
						</div>
					</div>
					<div class="custom-circle custom-circle-small custom-circle-pos-4 custom-circle-pos-4-4 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="1600">
						<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.6, 'transition': true, 'transitionDuration': 500}">
						</div>
					</div>
					<div class="custom-circle custom-circle-medium custom-circle-pos-5 custom-circle-pos-5-5 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1050" data-appear-animation-duration="2s">
						<div class="bg-color-secondary rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.2, 'transition': true, 'transitionDuration': 2000}">
						</div>
					</div>
					<div class="custom-circle custom-circle-medium custom-circle-pos-6 custom-circle-pos-6-6 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1200" data-appear-animation-duration="2s">
						<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.8, 'transition': true, 'transitionDuration': 500}">
						</div>
					</div>
					<div class="row py-5 mb-5 mt-2 p-relative z-index-1">
						<div class="col">
							<div class="overflow-hidden">
								<ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="800">
									<li><a href="demo-seo-2.html">Home</a></li>
									<li class="active">Upload New Files</li>
								</ul>
							</div>
							<div class="overflow-hidden mb-4">
								<h1 class="d-block text-color-quaternary font-weight-bold line-height-3 text-center mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1000">Start New File Upload Session</h1>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="section bg-color-light position-relative border-0 pt-3 m-0">
				<svg class="custom-page-header-curved-top-1" width="100%" height="700" xmlns="http://www.w3.org/2000/svg">
					<path transform="rotate(-3.1329219341278076 1459.172607421877,783.5322875976566) " d="m-12.54488,445.11701c0,0 2.16796,-1.48437 6.92379,-3.91356c4.75584,-2.42918 12.09956,-5.80319 22.45107,-9.58247c20.70303,-7.55856 53.43725,-16.7382 101.56202,-23.22255c48.12477,-6.48434 111.6401,-10.27339 193.90533,-7.05074c41.13262,1.61132 88.20271,5.91306 140.3802,12.50726c230.96006,32.89734 314.60609,102.57281 635.26547,59.88645c320.65938,-42.68635 452.47762,-118.72154 843.58759,3.72964c391.10997,122.45118 553.23416,-82.15958 698.49814,-47.66481c-76.25064,69.23438 407.49874,281.32592 331.2481,350.5603c-168.91731,29.52009 85.02254,247.61162 -83.89478,277.13171c84.07062,348.27313 -2948.95065,-242.40222 -2928.39024,-287.84045" stroke-width="0" stroke="#000" fill="#FFF" id="svg_2" />
				</svg>
				<div class="container">
					<h1>Lets freaking go</h1>
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

<!-- Mirrored from www.okler.net/previews/porto/9.9.0/demo-seo-2-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Nov 2022 22:22:18 GMT -->

</html>