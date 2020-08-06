<?php include "funkcije.php";

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

    <!-- Title Page-->
    <title>Prijava zloupotreba</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="portos/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="portos/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="portos/vendor/animate/animate.min.css">
    <link rel="stylesheet" href="portos/vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="portos/vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="portos/vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="portos/vendor/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="portos/css/theme.css">
    <link rel="stylesheet" href="portos/css/theme-elements.css">
    <link rel="stylesheet" href="portos/css/theme-blog.css">
    <link rel="stylesheet" href="portos/css/theme-shop.css">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="portos/vendor/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="portos/vendor/rs-plugin/css/layers.css">
    <link rel="stylesheet" href="portos/vendor/rs-plugin/css/navigation.css">

    <!-- Demo CSS -->
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <!-- Libraries/Plugins -->
    <!-- <link id="bootstrap-css" href="./css/bootstrap.min.css" rel="stylesheet"> -->
    <link id="dropzone-css" href="./css/dropzone.min.css" rel="stylesheet">

    <!-- Icons Library -->
    <link id="font-awesome-css" href="./css/font-awesome.min.css" rel="stylesheet">

    <!-- Main CSS -->
    <link id="onyx-css" href="style2.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">





    <!-- Skin CSS -->
    <link rel="stylesheet" href="portos/css/skins/default.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="portos/css/custom.css">

    <!-- Head Libs -->
    <script src="portos/vendor/modernizr/modernizr.min.js"></script>
    <style>
        .hero-image {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/baner.png");
                height: 50%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;
                }
    </style>
</head>

<body class="animsition2"> 
    <div class="page-wrapper">
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
                <div class="header-body header-body-bottom-border border-top-0">
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-logo">
                                        <a href="index.php">
                                            <img alt="Porto" width="214" height="60" src="images/logo.png">
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="header-column justify-content-end">
                                <div class="header-row">
                                    <div class="header-nav header-nav-line header-nav-bottom-line header-nav-bottom-line-effect-1">
                                        <div class="header-nav-main header-nav-main-square header-nav-main-font-lg header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                            <nav class="collapse">
                                                <ul class="nav nav-pills" id="mainNav">
                                                    <li class="dropdown">
                                                        <a class="dropdown-item dropdown-toggle active" href="index.php">
                                                            Prijava
                                                        </a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a class="dropdown-item dropdown-toggle" href="About.html">
                                                            O projektu
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <!-- <div class="hero-image"></div> -->
            <!-- MAIN CONTENT-->
            <div class="main"  role="main">

                <div class="row">
                    <div class="container">
                        <img alt="Porto" src="images/baner.png">
                        	<!-- <section class="page-header page-header-modern page-header-background page-header-background-md parallax" data-plugin-parallax data-plugin-options="{'speed': 1.2, enableOnMobile: true}" data-image-src="images/baner.png"></section> -->
                    </div>
                </div>
                <!-- <div class="slider-container rev_slider_wrapper" style="height: 670px;">
					<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 670, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'enterpoint', 'speed': 1000, 'levels': [2,3,4,5,6,7,8,9,12,50], 'disable_onmobile': 'on' }, 'navigation' : {'arrows': { 'enable': true }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
						<ul>
							<li data-transition="fade">
								<img src="images/baner.png"  
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg"> 
								
							</li> 
						</ul>
					</div>
                </div> -->
             
                <div class="section__content section__content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="container">
                                <div id="input_form" class="card">
                                    <div class="card-header" style="color: #8f105f;">
                                        <strong>Prijava</strong> podaci
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="dropzone-form" action="validator.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="kategorija" class=" form-control-label">Kategorija</label><span class="text-danger"> *</span>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="kategorija" id="kategorija" class="form-control" name='kategorija' onchange='doThisOnChange(this.value)'>
                                                        <?php findAllCategories(); ?>
                                                    </select>
                                                    <small id="kateg_warning" class="form-text text-muted" style="display: none"><span style="color: red">Izaberite kategoriju</span></small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="kategorija_opis" class=" form-control-label">Pravni osnov</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <small id="kategorija_opis" class="form-text text-muted" style="display: none"></small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="opstina" class=" form-control-label">Opstina</label><span class="text-danger"> *</span>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="opstina" id="opstina" class="form-control">
                                                        <?php findAllOpstina(); ?>
                                                    </select>
                                                    <small id="opstina_warning" class="form-text text-muted" style="display: none"><span style="color: red">Izaberite opštinu</span></small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="opis" class=" form-control-label">Opis nepravilnosti</label><span class="text-danger"> *</span>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="opis" id="opis" rows="9" placeholder="Unesite nepravilnost..." class="form-control"></textarea>
                                                    <small id="opis_warning" class="form-text text-muted" style="display: none"><span style="color: red">Opis je obavezno polje</span></small>
                                                </div>
                                            </div>
                                            <div class="row form-group has-warning">
                                                <div class="col col-md-3">
                                                    <label for="name" class=" form-control-label">Ime i prezime</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="name" name="name" placeholder="Unesite ime i prezime" class="form-control">
                                                    <small id="name_warning" class="form-text text-muted" style="display: none"><span style="color: red">Ime i prezime je obavezno polje</span></small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email" name="email" placeholder="Unesite Email" class="form-control">
                                                    <small id="email_warning" class="help-block form-text" style="display: none"><span style="color: red">Unesite email</span></small>
                                                </div>
                                            </div>
                                            <input type="hidden" id="fajlovi" name="fajlovi">
                                            <div id="message"></div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="ecaptcha" class=" form-control-label">Captcha</label><span class="text-danger"> *</span>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="g-recaptcha" data-sitekey="6LdGgbgZAAAAAOlT-0CSgAHgpP0qa4YG3XbVU86n"></div>
                                                    <small id="captcha_warning" class="help-block form-text" style="display: none"><span style="color: red">Molimo cekirajte captcha formu</span></small>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="section-sub-title" style="color: #8f105f;"><span>Prilozi</span> </h4>

                                        </div>
                                        <div class="card-body card-block">
                                            <span>Samo JPG, PNG, PDF, DOC (Word), XLS (Excel) fajlovi su podrzani.</span>
                                            <span>Maksimalna velicina fajla je 25MB.</span>
                                            <form action="upload2.php" class="dropzone files-container form-inline">
                                                <div class="fallback"> <input name="file" type="file" multiple /> </div>
                                                <div class="dz-message" data-dz-message style="color: #8f105f;"><span>Prevucite fajl ili klinite ovdje za izbor fajla za upload</span></div>
                                            </form>


                                            <!-- Uploaded files section -->

                                            <span class="no-files-uploaded">Nije izabran nijedan fajl za upload.</span>
                                            <!-- Preview collection of uploaded documents -->
                                            <div class="preview-container dz-preview uploaded-files col-lg-9">
                                                <div id="previews">
                                                    <div id="onyx-dropzone-template">
                                                        <div class="onyx-dropzone-info">
                                                            <div class="thumb-container">
                                                                <img data-dz-thumbnail />
                                                            </div>
                                                            <div class="details">
                                                                <div>
                                                                    <span data-dz-name></span> <span data-dz-size></span>
                                                                </div>
                                                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                                                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                                                <div class="actions">
                                                                    <a href="#!" data-dz-remove><i class="fa fa-times"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <h4 class="section-sub-title" style="color: #8f105f;"><span>Broj</span> fajlova (<span class="uploaded-files-count">0</span>)</h4>

                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input id="submit-dropzone" class="btn btn-primary btn-sm" type="submit" name="submitDropzone" value="Submit" />
                                    </div>
                                </div>
                                <div id="animation" class="card">
                                    <div class="card-header">
                                        <strong>Prijava</strong> podaci:
                                    </div>
                                    <div class="card-body card-block">
                                        <div style="width: 300px; height: 300px; margin: 0 auto;">
                                            <lottie-player src="animation.json" mode="bounce" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">Prijava je uspjesno poslata</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
   
    <!-- Jquery JS-->
    <!-- <script src="vendor/jquery-3.2.1.min.js"></script> -->
    <script src="./js/jquery-1.10.2.min.js"></script>

    <!-- Dropzone JS -->
    <script src="./js/dropzone.min.js"></script>


    <!-- Bootstrap JS-->
    <!-- <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script> -->
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <!-- <script src="vendor/animsition/animsition.min.js"></script> -->
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!-- Main JS-->
    <!-- <script src="js/main.js"></script> -->
    <!-- Main JS file -->
    <script src="./js/scripts.js"></script>
</body>
<!-- <script src="portos/vendor/jquery/jquery.min.js"></script>
<script src="portos/vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="portos/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="portos/vendor/jquery.cookie/jquery.cookie.min.js"></script>
<script src="portos/vendor/popper/umd/popper.min.js"></script>
<script src="portos/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="portos/vendor/common/common.min.js"></script>
<script src="portos/vendor/jquery.validation/jquery.validate.min.js"></script>
<script src="portos/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="portos/vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="portos/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="portos/vendor/isotope/jquery.isotope.min.js"></script>
<script src="portos/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="portos/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="portos/vendor/vide/jquery.vide.min.js"></script>
<script src="portos/vendor/vivus/vivus.min.js"></script>
<script src="portos/js/theme.js"></script>
<script src="portos/js/custom.js"></script>
<script src="portos/js/theme.init.js"></script> -->
<script src="portos/vendor/jquery/jquery.min.js"></script>
		<script src="portos/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="portos/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="portos/vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="portos/vendor/popper/umd/popper.min.js"></script>
		<script src="portos/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="portos/vendor/common/common.min.js"></script>
		<script src="portos/vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="portos/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="portos/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="portos/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="portos/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="portos/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="portos/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="portos/vendor/vide/jquery.vide.min.js"></script>
		<script src="portos/vendor/vivus/vivus.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="portos/js/theme.js"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="portos/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="portos/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="portos/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>
		<script src="portos/js/views/view.home.js"></script>
		
		<!-- Theme Custom -->
		<script src="portos/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="portos/js/theme.init.js"></script>
</html>
<!-- end document-->