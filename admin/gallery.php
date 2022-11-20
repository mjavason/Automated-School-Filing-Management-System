<?php
require_once('config/connect.php');
require_once('functions/functions.php');


if (!isset($_SESSION['super_log'])) {
    gotoPage("../user/index");
}

if (!isset($_GET['upload_id'])) {
    gotoPage("dashboard.php");
}


$ds = DIRECTORY_SEPARATOR;
$uploadInfo = getUploadInfo($_GET['upload_id']);
$studentInfo = getStudentInfo($uploadInfo['student_id']);

if (!$uploadInfo || !$studentInfo) {
    gotoPage("dashboard.php");
}

?>

<!DOCTYPE html>
<html data-style-switcher-options="{'changeLogo': false, 'colorPrimary': '#e23c8e', 'colorSecondary': '#a33188', 'colorTertiary': '#4046b3', 'colorQuaternary': '#171940'}">


<head>
    <title><?= $studentInfo['first_name'] ?> Gallery - ESUT Filing Management System </title>
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
                    <!-- <div class="custom-circle custom-circle-wrapper custom-circle-big custom-circle-pos-1 custom-circle-pos-1-1 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="900" data-appear-animation-duration="2s">
                        <div class="bg-color-tertiary rounded-circle w-95 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 1000}">
                        </div>
                    </div>
                    <div class="custom-circle custom-circle-medium custom-circle-pos-2 custom-circle-pos-2-2 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1450" data-appear-animation-duration="2s">
                        <div class="custom-bg-color-grey-2 rounded-circle w-95 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.2, 'transition': true, 'transitionDuration': 2000}">
                        </div>
                    </div>
                    <div class="custom-circle custom-circle-medium custom-circle-pos-3 custom-circle-pos-3-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="1300">
                        <div class="custom-bg-color-grey-2 rounded-circle w-95 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.3, 'transition': true, 'transitionDuration': 1000}">
                        </div>
                    </div>
                    <div class="custom-circle custom-circle-small custom-circle-pos-4 custom-circle-pos-4-4 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="1600">
                        <div class="custom-bg-color-grey-2 rounded-circle w-95 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.6, 'transition': true, 'transitionDuration': 500}">
                        </div>
                    </div>
                    <div class="custom-circle custom-circle-medium custom-circle-pos-5 custom-circle-pos-5-5 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1050" data-appear-animation-duration="2s">
                        <div class="bg-color-secondary rounded-circle w-95 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.2, 'transition': true, 'transitionDuration': 2000}">
                        </div>
                    </div>
                    <div class="custom-circle custom-circle-medium custom-circle-pos-6 custom-circle-pos-6-6 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1200" data-appear-animation-duration="2s">
                        <div class="custom-bg-color-grey-2 rounded-circle w-95 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.8, 'transition': true, 'transitionDuration': 500}">
                        </div>
                    </div> -->
                    <div class="row py-5 mb-5 mt-2 p-relative z-../user/index-1">
                        <div class="col">
                            <div class="overflow-hidden">
                                <ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="800">
                                    <li><a href="demo-seo-2.html">Home</a></li>
                                    <li class="active">Gallery</li>
                                </ul>
                            </div>
                            <div class="overflow-hidden mb-4">
                                <h1 class="d-block text-color-quaternary font-weight-bold line-height-3 text-center mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1000">File Checking For Approval</h1>
                                <!-- <h2 class="d-block text-color-quaternary font-weight-bold line-height-3 text-center mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1000">Year <?= $_SESSION['student_next_filing_session'] ?> -->
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="student_info" class="section position-relative bg-color-light border-0 m-0">

                <div class="container py-4">

                    <div class="row">
                        <div class="col">
                            <div class="blog-posts single-post">

                                <article class="post post-large blog-single-post border-0 m-0 p-0">
                                    <div class="post-image ms-0">
                                        <div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
                                            <div class="row mx-0">
                                                <div class="col-6 col-md-4 p-0">
                                                    <a href="..\user\uploads\<?= $studentInfo['reg_no'] . $ds . 'year' . $uploadInfo['level'] . $ds . 'course_reg1' . $ds . $uploadInfo['course_reg1'] ?>">
                                                        <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                            <span class="thumb-info-wrapper">
                                                                <img src="..\user\uploads\<?= $studentInfo['reg_no'] . $ds . 'year' . $uploadInfo['level'] . $ds . 'course_reg1' . $ds . $uploadInfo['course_reg1'] ?>" class="img-fluid" alt="" />
                                                                <span class="thumb-info-action">
                                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="col-6 col-md-4 p-0">
                                                    <a href="..\user\uploads\<?= $studentInfo['reg_no'] . $ds . 'year' . $uploadInfo['level'] . $ds . 'course_reg2' . $ds . $uploadInfo['course_reg2'] ?>">
                                                        <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                            <span class="thumb-info-wrapper">
                                                                <img src="..\user\uploads\<?= $studentInfo['reg_no'] . $ds . 'year' . $uploadInfo['level'] . $ds . 'course_reg2' . $ds . $uploadInfo['course_reg2'] ?>" class="img-fluid" alt="" />
                                                                <span class="thumb-info-action">
                                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="col-6 col-md-4 p-0">
                                                    <a href="..\user\uploads\<?= $studentInfo['reg_no'] . $ds . 'year' . $uploadInfo['level'] . $ds . 'departmental_fee' . $ds . $uploadInfo['departmental_fee'] ?>">
                                                        <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                            <span class="thumb-info-wrapper">
                                                                <img src="..\user\uploads\<?= $studentInfo['reg_no'] . $ds . 'year' . $uploadInfo['level'] . $ds . 'departmental_fee' . $ds . $uploadInfo['departmental_fee'] ?>" class="img-fluid" alt="" />
                                                                <span class="thumb-info-action">
                                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="col-6 col-md-4 p-0">
                                                    <a href="..\user\uploads\<?= $studentInfo['reg_no'] . $ds . 'year' . $uploadInfo['level'] . $ds . 'faculty_fee' . $ds . $uploadInfo['faculty_fee'] ?>">
                                                        <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                            <span class="thumb-info-wrapper">
                                                                <img src="..\user\uploads\<?= $studentInfo['reg_no'] . $ds . 'year' . $uploadInfo['level'] . $ds . 'faculty_fee' . $ds . $uploadInfo['faculty_fee'] ?>" class="img-fluid" alt="" />
                                                                <span class="thumb-info-action">
                                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="col-6 col-md-4 p-0">
                                                    <a href="..\user\uploads\<?= $studentInfo['reg_no'] . $ds . 'year' . $uploadInfo['level'] . $ds . 'school_fees' . $ds . $uploadInfo['school_fees'] ?>">
                                                        <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                            <span class="thumb-info-wrapper">
                                                                <img src="..\user\uploads\<?= $studentInfo['reg_no'] . $ds . 'year' . $uploadInfo['level'] . $ds . 'school_fees' . $ds . $uploadInfo['school_fees'] ?>" class="img-fluid" alt="" />
                                                                <span class="thumb-info-action">
                                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <!-- <div class="col-6 col-md-4 p-0">
                                                    <a href="img/blog/square/blog-40.jpg">
                                                        <span class="thumb-info thumb-info-no-borders thumb-info-centered-icons">
                                                            <span class="thumb-info-wrapper">
                                                                <img src="img/blog/square/blog-40.jpg" class="img-fluid" alt="" />
                                                                <span class="thumb-info-action">
                                                                    <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-plus text-dark"></i></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post-date ms-0">
                                        <span class="day"><?= date('d', strtotime($uploadInfo['date_created'])) ?></span>
                                        <span class="month"><?= date('M', strtotime($uploadInfo['date_created'])) ?></span>
                                    </div>

                                    <div class="post-content ms-0">

                                        <div class="post-meta">
                                            <span><i class="far fa-user"></i> Student Name: <a href="#student_info"><?= ucwords($studentInfo['first_name']) . ' ' . ucwords($studentInfo['last_name']) ?></a> </span>
                                            <span><i class="far fa-calendar"></i> Admission Session: <a href="#student_info"><?= $studentInfo['set_year'] ?></a> </span>
                                            <span><i class="far fa-clock"></i> Current Level: <a href="#student_info"><?= calculateStudentLevel($studentInfo['set_year']) ?>00</a> </span>

                                            <!-- <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                            <span><i class="far fa-folder"></i> <a href="#">Lifestyle</a>, <a href="#">Design</a> </span>
                                            <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span> -->
                                        </div>

                                        <div class="post-block mt-5 post-leave-comment">
                                            <!-- <h4 class="mb-3">Approve or Decline Files</h4> -->

                                            <form class="contact-form p-4 rounded bg-color-grey" action="https://www.okler.net/previews/porto/9.9.0/php/contact-form.php" method="POST">

                                                <div class="p-2">
                                                    <div class="row">
                                                        <div class="form-group col">
                                                            <label for="comment" class="form-label required font-weight-bold text-dark">Comment</label>
                                                            <input id="file_comment" type="text" value="-" data-msg-required="Please enter a comment, especially if files are rejected." maxlength="100" class="form-control" name="comment" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-lg-6">
                                                            <a onclick="approveUpload('functions/approveFile.php?upload_id=<?= $_GET['upload_id'] ?>', getInputValuesAndReturnTheirContentAsJson(['file_comment']))" class="btn btn-rounded btn-success mb-2 form-control">Approve</a>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <a onclick="rejectUpload('functions/rejectFile.php?upload_id=<?= $_GET['upload_id'] ?>', getInputValuesAndReturnTheirContentAsJson(['file_comment']))" class="btn btn-rounded btn-danger mb-2 form-control">Reject</a>
                                                        </div>
                                                    </div>


                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </article>

                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <?php require_once('includes/footer.php') ?>


    </div>
    <?php require_once('includes/js_imports.php') ?>


    <!-- Vendor -->
    <script src="vendor/plugins/js/plugins.min.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Demo -->
    <script src="js/demos/demo-seo-2.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>

</body>

</html>