<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
    <title><?php echo F::sg('seo', 'mainTitle')?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--meta info-->
    <meta name="author" content="Yincart Team">
    <meta name="keywords" content="<?php echo F::sg('seo', 'mainKwrds')?>">
    <meta name="description" content="<?php echo F::sg('seo', 'mainDescr')?>">
    <link rel="icon" type="image/ico" href="<?php echo F::themeUrl() ?>/images/fav.ico">
    <!--stylesheet include-->
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo F::themeUrl() ?>/css/colorpicker.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo F::themeUrl() ?>/css/flexslider.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo F::themeUrl() ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo F::themeUrl() ?>/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo F::themeUrl() ?>/css/owl.transitions.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo F::themeUrl() ?>/css/jquery.custom-scrollbar.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo F::themeUrl() ?>/css/style.css">
    <!--font include-->
    <link href="<?php echo F::themeUrl() ?>/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo F::themeUrl() ?>/js/modernizr.js"></script>
</head>
<body>
<!--boxed layout-->
<div class="wide_layout relative w_xs_auto">
    <!--[if (lt IE 9) | IE 9]>
    <div style="background:#fff;padding:8px 0 10px;">
        <div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>
    <![endif]-->
    <!--markup header type 2-->
    <header role="banner">
        <!--header top part-->
        <?php $this->widget('application.modules.site.widgets.WTopNav') ?>
        <!--header bottom part-->
        <?php $this->widget('application.modules.site.widgets.WHeader') ?>
        <!--main menu container-->
        <?php $this->widget('application.modules.site.widgets.WMainMenu') ?>
    </header>
    <!--content-->
        <?php echo $content ?>
    <!--markup footer-->
        <?php $this->widget('application.modules.site.widgets.WFooter') ?>
</div>
<!--social widgets-->
    <?php $this->widget('application.modules.site.widgets.WSocial') ?>
<!--custom popup-->
    <?php $this->widget('application.modules.site.widgets.WPopupCustom') ?>
<!--login popup-->
    <?php $this->widget('application.modules.site.widgets.WPopupLogin') ?>
<button class="t_align_c r_corners type_2 tr_all_hover animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>
<!--scripts include-->
<script src="<?php echo F::themeUrl() ?>/js/jquery-2.1.0.min.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/retina.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/jquery.flexslider-min.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/styleswitcher.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/colorpicker.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/waypoints.min.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/jquery.isotope.min.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/jquery.tweet.min.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/jquery.custom-scrollbar.js"></script>
<script src="<?php echo F::themeUrl() ?>/js/scripts.js"></script>
</body>
</html>