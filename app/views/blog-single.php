<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Casinal</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- owl carousel style -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?= assets('assets/css/bootstrap.min.css') ?>">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?=  assets('assets/css/style.css') ?>">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= assets('assets/css/responsive.css') ?>">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= assets('assets/css/jquery.mCustomScrollbar.min.css') ?>">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="<?= assets('assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= assets('assets/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
<div class="header_section">
    <div class="header_bg">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="logo" href="index.html"><img src="<?= assets('assets/images/logo.png') ?>"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= url('/') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.html">Services</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url('/contact') ?>">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

    </div>
    <!--banner section start -->
    <div class="banner_section layout_padding">
        <h1 style="font-size: 50px; font-weight: bold; text-align: center">Blog Detail</h1>

        <div class="container">
            <div class="blog_section_2">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= img($blog['image']) ?>" class="image_7" style="width:200px">
                    </div>
                    <div class="col-md-6">
                        <a href="<?= url('/blog/'. $blog['slug']) ?>"><h4 class="classes_text"><?= $blog['title']  ?></h4></a>
                        <p class="ipsum_text"> <?= $blog['text'] ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner section end -->
</div>



<div class="footer_section layout_padding">
    <div class="container">


        <div class="footer_section_2">
            <div class="row">
                <div class="col-lg-3 margin_top">
                    <div class="call_text"><a href="#"><img src="images/call-icon1.png"><span class="padding_left_15">Call Now +01 9876543210</span></a></div>
                    <div class="call_text"><a href="#"><img src="images/mail-icon1.png"><span class="padding_left_15">demo@gmail.com</span></a></div>
                </div>
                <div class="col-lg-3">
                    <div class="information_main">
                        <h4 class="information_text">Information</h4>
                        <p class="many_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="information_main">
                        <h4 class="information_text">Helpful Links</h4>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="news.html">News</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="information_main">
                        <div class="footer_logo"><a href="index.html"><img src="images/footer-logo.png"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer section end -->
<!-- copyright section start -->
<!-- copyright section end -->
<!-- Javascript files-->
<script src="<?= assets('assets/js/jquery.min.js') ?>"></script>
<script src="<?= assets('assets/js/popper.min.js') ?>"></script>
<script src="<?= assets('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= assets('assets/js/jquery-3.0.0.min.js') ?>"></script>
<script src="<?= assets('assets/js/plugin.js') ?>"></script>
<!-- sidebar -->
<script src="<?= assets('assets/js/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
<script src="<?= assets('assets/js/custom.js') ?>"></script>
<!-- javascript -->
<script src="<?= assets('assets/js/owl.carousel.js') ?>"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>