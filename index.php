<?php

include("./config/configdb.php");
session_start();

$users_info_query= "SELECT * FROM users";
$users = mysqli_fetch_assoc(mysqli_query($db_connect,$users_info_query));

$portfolio_info_query= "SELECT * FROM portfolios WHERE status='active'";
$portfolios = mysqli_query($db_connect,$portfolio_info_query);

$feature_info_query= "SELECT * FROM features WHERE status='active'";
$features = mysqli_query($db_connect,$feature_info_query);

$testimonials_info_query= "SELECT * FROM testimonials WHERE status='active'";
$testimonials = mysqli_query($db_connect,$testimonials_info_query);


$skills_info_query= "SELECT * FROM skills WHERE status='active'";
$skills = mysqli_query($db_connect,$skills_info_query);

$educations_info_query= "SELECT * FROM educations WHERE status='active'";
$educations = mysqli_query($db_connect,$educations_info_query);

$courses_info_query= "SELECT * FROM courses WHERE status='active'";
$courses = mysqli_query($db_connect,$courses_info_query);

$job_info_query= "SELECT * FROM jobs WHERE status='active'";
$jobs = mysqli_query($db_connect,$job_info_query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home consulting || Inbio - Personal Portfolio Bootstrap-5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="./frontend_assets/images/favicon.ico">
    <!-- CSS 
    ============================================ -->
    <link rel="stylesheet" href="./frontend_assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="./frontend_assets/css/vendor/slick.css">
    <link rel="stylesheet" href="./frontend_assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="./frontend_assets/css/vendor/aos.css">
    <link rel="stylesheet" href="./frontend_assets/css/plugins/feature.css">
    <!-- Style css -->
    <link rel="stylesheet" href="./frontend_assets/css/style.css">
</head>

<body class="template-color-1 home-sticky spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="150">

    <!-- start Header area -->
    <div class="d-none d-xl-block">
        <header class="rn-header-area d-flex align-items-start flex-column left-header-style">
            <div class="logo-area">
                <a href="index.html">
                    <img src="./uploads/profile_images/<?= $users['image'] ?>" alt="personal-logo">
                </a>
            </div>
            <nav id="sideNavs" class="mainmenu-nav navbar-example2 onepagenav">
                <ul class="primary-menu nav nav-pills">
                    <li class="nav-item current"><a class="nav-link smoth-animation-two" href="#home"><i data-feather="home"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#features"> <i data-feather="briefcase"></i>Features</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#portfolio"><i data-feather="layers"></i>Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#resume"><i data-feather="users"></i>Resume</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#experience"><i data-feather="user"></i>Experience</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#testimonial"><i data-feather="send"></i>Testimonial</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#contacts"><i data-feather="message-circle"></i>Contact</a></li>
                </ul>
            </nav>
            <div class="footer">
                <div class="social-share-style-1 mt--40">
                    <span class="title">find with me</span>
                    <ul class="social-share d-flex liststyle">
                        <li class="facebook"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg></a>
                        </li>
                        <li class="instagram"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg></a>
                        </li>
                        <li class="linkedin"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    </div>
    <!-- start Header area end -->

    <!-- Header Mobile Bar  -->
    <div class="header-style-2 d-block d-xl-none">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="logo">
                    <a href="index.html">
                        <img src="./uploads/profile_images/<?= $users['image'] ?>" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="header-right text-end">
                    <div class="hamberger-menu">
                        <i id="menuBtn" class="feather-menu humberger-menu"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Mobile Bar  -->

    <!-- Start Popup Mobile Menu  -->
    <div class="popup-mobile-menu">
        <div class="inner">
            <div class="menu-top">
                <div class="menu-header">
                    <a class="logo" href="index.html">
                        <img src="./uploads/profile_images/<?= $users['image'] ?>" alt="Personal Portfolio">
                    </a>
                    <div class="close-button">
                        <button class="close-menu-activation close"><i data-feather="x"></i></button>
                    </div>
                </div>
                <p class="discription">Inbio is a personal portfolio template. You can customize all.</p>
            </div>
            <div class="content">
                <ul class="primary-menu nav nav-pills">
                    <li class="nav-item"><a class="nav-link smoth-animation-two active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#resume">Resume</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#testimonial">Testimonial</a></li>
                    
                    <li class="nav-item"><a class="nav-link smoth-animation-two" href="#contacts">Contact</a></li>
                </ul>
                <!-- social sharea area -->
                <div class="social-share-style-1 mt--40">
                    <span class="title">find with me</span>
                    <ul class="social-share d-flex liststyle">
                        <li class="facebook"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg></a>
                        </li>
                        <li class="instagram"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg></a>
                        </li>
                        <li class="linkedin"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg></a>
                        </li>
                    </ul>
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
    <!-- End Popup Mobile Menu  -->

    <main class="page-wrapper-two">

        <!-- start slider area -->
        <section id="home" class="slider-style-5 rn-section-gap pb--110 align-items-center with-particles">
            <div id="particles-js"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-inner">
                            <div class="thumbnail gradient-border gradient-animation">
                                <img id="border" class="gradient-border" src="./uploads/profile_images/<?= $users['image'] ?>" alt="">
                            </div>
                            <h1><?= $users['name'] ?></h1>
                            <!-- type headline start-->
                            <span class="cd-headline clip is-full-width">
                                <span>I am a</span>
                            <!-- ROTATING TEXT -->
                            <span class="cd-words-wrapper">
                                    <b class="is-visible"><?= $users['title'] ?></b>
                                    <b class="is-hidden">Consulter.</b>
                                    <b class="is-hidden">Developer.</b>
                                </span>
                            </span>
                            <!-- type headline end -->
                            <div class="button-area">
                                <a class="rn-btn" href="#contacts"><span>CONTACT ME</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- start slider area End -->

        <!-- Start Service Area -->
        <div class="rn-service-area rn-section-gap section-separator" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true">
                            <span class="subtitle">Features</span>
                            <h2 class="title">What I Do</h2>
                        </div>
                    </div>
                </div>
                <div class="row row--25 mt_md--10 mt_sm--10">

                    <!-- Start Single Service -->
                    <?php if(isset($features)) : foreach($features as $feature) : ?>
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="<?= $feature['icon'] ?>"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="#"><?= $feature['name'] ?></a></h4>
                                    <p class="description"><?= substr_replace($feature['description'], "...", 100) ?></p>
                                    <a class="read-more-button" href="#"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="#"></a>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                    <!-- End SIngle Service -->

                </div>
            </div>
        </div>
        <!-- End Service Area  -->


        <!-- Start Portfolio Area -->
        <div class="rn-portfolio-area rn-section-gap section-separator" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle">Visit my portfolio and keep your feedback</span>
                            <h2 class="title">My Portfolio</h2>
                        </div>
                    </div>
                </div>

                <div class="row row--25 mt--10 mt_md--10 mt_sm--10">
                    <?php if(isset($portfolios)) : foreach($portfolios as $portfolio) : ?>
                    <!-- Start Single Portfolio -->
                    <div data-aos="fade-up" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter<?= $portfolio['id'] ?>">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="./uploads/portfolio_images/<?= $portfolio['image'] ?>" alt="Personal Portfolio Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)"><?= $portfolio['name'] ?></a>
                                        </div>
                                        <div class="meta">
                                            <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                        600</span>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="javascript:void(0)"><?= substr_replace($portfolio['description'], "...", 100) ?><i
                                        class="feather-arrow-up-right"></i></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Portfolio -->
                    <!-- Modal Portfolio Body area Start -->
        <div class="modal fade" id="exampleModalCenter<?= $portfolio['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i data-feather="x"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center">

                            <div class="col-lg-6">
                                <div class="portfolio-popup-thumbnail">
                                    <div class="image">
                                        <img class="w-100" src="./uploads/portfolio_images/<?= $portfolio['image'] ?>" alt="slide">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="text-content">
                                    <h3>
                                        <span>Featured - Design</span> <?= $portfolio['name'] ?>
                                    </h3>
                                    <p class="mb--30"><?= $portfolio['description'] ?></p>
                                    
                                    <div class="button-group mt--20">
                                        <a href="#" class="rn-btn thumbs-icon">
                                            <span>LIKE THIS</span>
                                            <i data-feather="thumbs-up"></i>
                                        </a>
                                        <a href="#" class="rn-btn">
                                            <span>VIEW PROJECT</span>
                                            <i data-feather="chevron-right"></i>
                                        </a>
                                    </div>

                                </div>
                                <!-- End of .text-content -->
                            </div>
                        </div>
                        <!-- End of .row Body-->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Portfolio area -->
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
        <!-- End portfolio Area -->
        <!-- Start Resume Area -->
        <div class="rn-resume-area rn-section-gap section-separator" id="resume">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle">15+ Years of Education History</span>
                            <h2 class="title">My Resume</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--45">
                    <div class="col-lg-12">
                        <ul class="rn-nav-list nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="education-tab" data-bs-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="true">education</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="professional-tab" data-bs-toggle="tab" href="#professional" role="tab" aria-controls="professional" aria-selected="false">professional
                                    Skills</a>
                            </li>
                          
                        </ul>

                        <!-- Start Tab Content Wrapper  -->
                        <div class="rn-nav-content tab-content" id="myTabContents">
                            <!-- Start Single Tab  -->
                            <div class="tab-pane show active fade single-tab-area" id="education" role="tabpanel" aria-labelledby="education-tab">
                                <div class="personal-experience-inner mt--40">
                                    <div class="row">
                                        <!-- Start Skill List Area  -->
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="content">
                                                <span class="subtitle">2007 - 2026</span>
                                                <h4 class="maintitle">Education Quality</h4>
                                                <div class="experience-list">

                                                    <!-- Start Single List  -->
                                                    <?php if(isset($educations)) : foreach($educations as $edu) : ?>
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4><?= $edu['name'] ?></h4>
                                                                    <span><?= $edu['position'] ?> (<?= $edu['study_from'] ?> - <?= $edu['study_to'] ?>)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span><?= $edu['location'] ?></span>
                                                                </div>
                                                            </div>
                                                            <!-- <p class="description">The education should be very
                                                                interactual. Ut tincidunt est ac dolor aliquam sodales.
                                                                Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                                mauris hendrerit ante.</p> -->
                                                        </div>
                                                    </div>
                                                    <?php endforeach; endif; ?>
                                                    <!-- End Single List  -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->

                                        <!-- Start Skill List Area 2nd  -->
                                        <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                            <div class="content">
                                                <span class="subtitle">2019 - 2023</span>
                                                <h4 class="maintitle">Remarkable Achievements</h4>
                                                <div class="experience-list">

                                                    <!-- Start Single List  -->
                                                    <?php if(isset($courses)) : foreach($courses as $course) : ?>
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4><?= $course['course_name'] ?></h4>
                                                                    <span><?= $course['name_of_institute'] ?> (<?= $course['course_from'] ?> - <?= $course['course_to'] ?>)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span><?= $course['location'] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; endif; ?>
                                                    <!-- End Single List  -->

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab  -->

                            <!-- Start Single Tab  -->
                            <div class="tab-pane fade " id="professional" role="tabpanel" aria-labelledby="professional-tab">
                                <div class="personal-experience-inner mt--40">
                                    <div class="row row--40">

                                        

                                        <!-- Start Single Progressbar  -->
                                        <div class="col-lg-6 col-md-6 col-xl-12 mt_sm--60">
                                            <div class="progress-wrapper">
                                                <div class="content">
                                                    <span class="subtitle">Features</span>
                                                    <h4 class="maintitle">Development Skill</h4>
                                                    <!-- Start Single Progress Charts -->
                                                    <?php if(isset($skills)) : foreach($skills as $skill) : ?>
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6"><?= $skill['title_of_skills'] ?></h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay=".1s" role="progressbar" style="width: <?= $skill['percentage_of_skills'] ?>%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span
                                                            class="percent-label"><?= $skill['percentage_of_skills'] ?>%</span></div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; endif; ?>
                                                    <!-- End Single Progress Charts -->

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Progressbar  -->

                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab  -->

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Resume Area -->
        <!-- Start Client Area -->
        <<div id="experience" class="rn-experience-area section-separator rn-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="section-title text-center aos-init aos-animate">
                            <span class="subtitle">Over 3+ years  of experience</span>
                            <h2 class="title">My Experience</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--10">
                    <div class="col-12 mt_experience">

                        <!-- single skills -->
                        <?php if(isset($jobs)) : foreach($jobs as $job) : ?>
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="experience-style-two aos-init aos-animate">
                            <div class="experience-left">
                                <div class="experience-image">
                                    <img src="./uploads/job_images/<?= $job['company_image'] ?>" alt="Personal Portfolio">
                                </div>
                                <div class="experience-center">
                                    <span class="date">From <?= $job['job_from'] ?> - To <?= (isset($job['job_from'])) ? $job['job_from'] : 'Present' ; ?></span>
                                    <h4 class="experience-title">
                                    <?= $job['company_name'] ?>
                                    </h4>
                                    <h6 class="subtitle">
                                    <?= $job['job_title'] ?>
                                    </h6>
                                    <!-- <p class="disc">Reinvetning the way you create websites</p> -->
                                </div>
                            </div>
                            <div class="experience-right">
                                <div class="experience-footer">
                                    <a class="rn-btn" href="#contacts"><span>CONTACT ME</span></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>
                        <!-- single skills -->       

                    </div>
                </div>
            </div>
        </div>
        <!-- End client section -->
        <!-- testimonial part start -->
        
        <div class="rn-testimonial-area rn-section-gap section-separator" id="testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle">What Clients Say</span>
                            <h2 class="title">Testimonial</h2>
                        </div>
                    </div>
                </div>
                <?php  if(isset($testimonials)): foreach($testimonials as $testimonial) : ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonial-activation testimonial-pb mb--30">
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="./uploads/testimonial_images/<?= $testimonial['client_image']  ?>" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10"><?= $testimonial['client_company']  ?></span>
                                            <h3 class="title"><?= $testimonial['client_name']  ?></h3>
                                            <span class="designation"><?= $testimonial['client_designation']  ?></span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title"><?= $testimonial['feedback_subject']  ?></h3>
                                                <span class="date">via Upwork - From <?= $testimonial['working_form']  ?> - To <?= $testimonial['working_to']  ?></span>
                                            </div>
                                            <div class="rating">
                                                <img src="./frontend_assets/images/icons/rating.png" alt="rating-image">
                                                <img src="./frontend_assets/images/icons/rating.png" alt="rating-image">
                                                <img src="./frontend_assets/images/icons/rating.png" alt="rating-image">
                                                <img src="./frontend_assets/images/icons/rating.png" alt="rating-image">
                                                <img src="./frontend_assets/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                        <?= $testimonial['feedback_message']  ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                        </div>
                    </div>
                    <?php  endforeach; endif; ?>
                </div>
            </div>
        </div>
        
        <!-- testimonial part end -->
   
        <!-- Start Contact section -->
        <div class="rn-contact-area rn-section-gap section-separator" id="contacts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle">Contact</span>
                            <h2 class="title">Contact With Me</h2>
                        </div>
                    </div>
                </div>

                <div class="row mt--50 mt_md--40 mt_sm--40 mt-contact-sm">
                    <div class="col-lg-5">
                        <div class="contact-about-area">
                            <div class="thumbnail">
                                <img src="./uploads/profile_images/<?= $users['image'] ?>" alt="contact-img">
                            </div>
                            <div class="title-area">
                                <h4 class="title"><?= $users['name'] ?></h4>
                                <span><?= $users['title'] ?></span>
                            </div>
                            <div class="description">
                                <p><?= $users['about'] ?>
                                </p>
                                <span class="phone">Phone: <a href="tel:01941043264"><?= $users['contact'] ?></a></span>
                                <span class="mail">Email: <a href="mailto:admin@example.com"><?= $users['email'] ?></a></span>
                            </div>
                            <div class="social-area">
                                <div class="name">FIND WITH ME</div>
                                <div class="social-icone">
                                    <a href="#"><i data-feather="facebook"></i></a>
                                    <a href="#"><i data-feather="linkedin"></i></a>
                                    <a href="#"><i data-feather="instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos-delay="600" class="col-lg-7 contact-input">
                    <?php if (isset($_SESSION['mail_success'])) : ?>
                            <button name="contact_send_btn" type="submit"  class="rn-btn">
                                <span><?= $_SESSION['mail_success']; ?></span>
                                <i data-feather="check"></i>
                            </button>
                            <?php endif;
                            unset($_SESSION['mail_success']); ?>

                        <div class="contact-form-wrapper">
                            <div class="introduce">

                                <form class="rnt-contact-form row" id="contact-form" method="POST" action="./dashboard/mail_submission.php">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-name">Your Name</label>
                                            <input class="form-control form-control-lg" name="contact_name" id="contact-name" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-phone">Phone Number</label>
                                            <input class="form-control" name="contact_phone" id="contact-phone" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="contact-email">Email</label>
                                            <input class="form-control form-control-sm" id="contact-email" name="contact_email" type="email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="subject">subject</label>
                                            <input class="form-control form-control-sm" id="subject" name="contact_subject" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="contact-message">Your Message</label>
                                            <textarea name="contact_message" id="contact-message" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button name="contact_send_btn" type="submit"  class="rn-btn">
                                            <span>SEND MESSAGE</span>
                                            <i data-feather="arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contuct section -->


  
        <!-- Start Footer Area -->
        <div class="rn-footer-area rn-section-gap section-separator">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-area text-center">

                            <div class="logo">
                                <a href="index.html">
                                    <img src="./uploads/profile_images/<?=  $users['image'] ?>" alt="logo">
                                </a>
                            </div>

                            <p class="description mt--30">© <?= date('Y') ?>. All rights reserved by <a target="_blank" href="https://themeforest.net/user/rainbow-themes/portfolio"><?=  $users['name'] ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Area -->



        <!-- Back to  top Start -->
        <div class="backto-top">
            <div>
                <i data-feather="arrow-up"></i>
            </div>
        </div>
        <!-- Back to top end -->

    </main>







    <!-- JS ============================================ -->
    <script src="./frontend_assets/js/vendor/jquery.js"></script>
    <script src="./frontend_assets/js/vendor/modernizer.min.js"></script>
    <script src="./frontend_assets/js/vendor/feather.min.js"></script>
    <script src="./frontend_assets/js/vendor/slick.min.js"></script>
    <script src="./frontend_assets/js/vendor/bootstrap.js"></script>
    <script src="./frontend_assets/js/vendor/text-type.js"></script>
    <script src="./frontend_assets/js/vendor/wow.js"></script>
    <script src="./frontend_assets/js/vendor/aos.js"></script>
    <script src="./frontend_assets/js/vendor/particles.js"></script>
    <script src="./frontend_assets/js/vendor/jquery-one-page-nav.js"></script>
    <!-- main JS -->
    <script src="./frontend_assets/js/main.js"></script>

    <script>
        particlesJS('particles-js',

            {
                "particles": {
                    "number": {
                        "value": 20,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": ["#ffffff", ]
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 4
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 0.8,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 4,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": false,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 800,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true,
                "config_demo": {
                    "hide_card": false,
                    "background_color": "#b61924",
                    "background_image": "",
                    "background_position": "50% 50%",
                    "background_repeat": "no-repeat",
                    "background_size": "cover"
                }
            }

        );
    </script>
</body>

</html>