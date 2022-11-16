<header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 70, 'stickyHeaderContainerHeight': 70}">
	<div class="header-body border-top-0 appear-animation" data-appear-animation="fadeIn">
		<div class="header-top">
			<div class="container">
				<div class="header-row">
					<div class="header-column justify-content-start">
						<div class="header-row">

						</div>
					</div>
					<div class="header-column justify-content-end">
						<div class="header-row">
							<ul class="header-social-icons social-icons social-icons-clean d-none d-lg-block me-3">
								<li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
								</li>
								<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
								<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
								</li>
							</ul>
							<?php if (isset($_SESSION['full_name']) && isset($_SESSION['student_email'])) { ?>
								<a href="mailto:<?= $_SESSION['student_email'] ?>" class="btn btn-tertiary font-weight-semibold text-3 px-4 custom-height-1 rounded-0 align-items-center d-none d-md-flex">
									<i class="icon-user icons text-4 me-2"></i> <?= $_SESSION['full_name'] ?>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-container container">
			<div class="header-row">
				<div class="header-column">
					<div class="header-row">
						<div class="header-logo">
							<a href="index">
								<img alt="Porto" width="126" height="32" src="img/demos/seo-2/logo.png">
							</a>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row">
						<div class="header-nav header-nav-links order-2 order-lg-1">
							<div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
								<nav class="collapse">
									<ul class="nav nav-pills" id="mainNav">
										<?php if (!isset($_SESSION['log'])) { ?>

											<li>
												<a class="nav-link" href="index">
													Home
												</a>
											</li>
										<?php } else { ?>
											<li>
												<a class="nav-link" href="dashboard">
													Dashboard
												</a>
											</li>
										<?php } ?>

										<li class="dropdown">
											<!-- <a class="dropdown-item dropdown-toggle" href="demo-seo-2-services.html">
												Dashboard
											</a> -->
											<!-- <ul class="dropdown-menu">
												<li>
													<a class="nav-link" href="demo-seo-2-services.html">Overview</a>
												</li>
												<li>
													<a class="nav-link" href="demo-seo-2-services-detail.html">Seo Services</a>
												</li>
												<li>
													<a class="nav-link" href="demo-seo-2-services-detail.html">Email
														Marketing</a>
												</li>
												<li>
													<a class="nav-link" href="demo-seo-2-services-detail.html">Data Analysis</a>
												</li>
												<li>
													<a class="nav-link" href="demo-seo-2-services-detail.html">Digital
														Marketing</a>
												</li>
												<li>
													<a class="nav-link" href="demo-seo-2-services-detail.html">Social Media
														Marketing</a>
												</li>
											</ul> -->
										</li>
										<li>
											<a class="nav-link" href="about">
												About
											</a>
										</li>
										<li>
											<a class="nav-link" href="contact">
												Contact Us
											</a>
										</li>
										<?php if (!isset($_SESSION['log'])) { ?>
											<li>

												<a class="nav-link" href="login">
													Login
												</a>
											</li>
										<?php } else { ?>
											<li>
												<a class="nav-link" onclick="logout()">
													Logout
												</a>
											</li>
										<?php } ?>
									</ul>
								</nav>
							</div>
							<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
								<i class="fas fa-bars"></i>
							</button>
						</div>
						<div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
							<div class="header-nav-feature header-nav-features-search d-inline-flex"> <a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch"><i class="fas fa-search header-nav-top-icon"></i></a>
								<div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
									<form role="search" action="https://www.okler.net/previews/porto/9.9.0/page-search-results.html" method="get">
										<div class="simple-search input-group"> <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search..."> <button class="btn" type="submit"> <i class="fas fa-search header-nav-top-icon"></i> </button>
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
</header>