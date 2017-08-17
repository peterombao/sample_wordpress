<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <!-- Stylesheets -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/rev-settings.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/owl.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <?php wp_head(); ?>
</head>
<body>
<!--Page Wrapper-->
<div class="page-wrapper">

    <!--Preloader Box-->
    <div class="preloader"></div>

    <!--Main Banner-->
    <section class="<?php echo is_front_page() ? 'main-banner' : 'page-banner'; ?> banner" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/parallax/banner-bg-1.jpg);">
        <!--Main Header-->
        <header class="main-header">
            <!--Top bar-->
            <div class="top-bar">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="topbar-wrap clearfix">
                            <!--Top Left-->
                            <div class="top-left clearfix col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <p class="email"><a href="mailto:company@name.com"><span class="fa fa-envelope"></span>&ensp;company@name.com</a></p><span class="bar">&ensp;&ensp;|&ensp;&ensp;</span><p class="phone"><span class="fa fa-phone"></span>&ensp;+80 12-878-587</p>
                            </div>
                            <!--Top Right-->
                            <div class="top-right col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <!--Social Links-->
                                <ul class="social-links anim-3-all">
                                    <li><a class="img-circle" href="#" title="Facebook"><span class="fa fa-facebook-f"></span></a></li>
                                    <li><a class="img-circle" href="#" title="Facebook"><span class="fa fa-twitter"></span></a></li>
                                    <li><a class="img-circle" href="#" title="Facebook"><span class="fa fa-linkedin"></span></a></li>
                                    <li><a class="img-circle" href="#" title="Facebook"><span class="fa fa-pinterest-p"></span></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--Top bar End-->

            <!--Lower Section-->
            <div class="lower-sec">
                <div class="auto-container">
                    <div class="row">
                        <!--Content Box-->
                        <div class="box-shadow-effect2">
                            <div class="content-box clearfix">
                                <!--Logo-->
                                <div class="logo col-lg-2 col-md-2 col-sm-2 anim-5-all"><a href="index.html">Buil<span class="theme-color">der</span></a></div>

                                <!--Navigation-->
                                <nav class="col-md-10 pull-right main-navigation">

                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                        <?php wp_nav_menu(
                                            array(
                                                'menu' => 'header',
                                                'menu_class' => 'navbar-nav navbar-left clearfix',
                                                'container_class' => 'navbar-collapse collapse menu'
                                            )
                                        );
                                        ?>
                                </nav>
                                <!--Navigation End-->

                                <!--Search Box-->
                                <div class="search-box widget">
                                    <form method="post" action="index.html">
                                        <fieldset class="form-group">
                                            <input type="search" name="search" value="" placeholder="search">
                                        </fieldset>
                                    </form>
                                </div>
                                <!--Search Box End-->

                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </header>
        <!--Main Header End-->