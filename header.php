<?php
/**
 * @package WordPress
 * @subpackage WestCottTheme
 */
global $westcott_theme_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/all.css" media="all" />
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.fancybox-1.3.4.css"/>
     <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/responsive_now.css" media="all" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
		wp_head(); ?>
	
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/PIE.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/init-pie.js"></script>
	<![endif]-->
	<script>var js_siteurl = "<?php bloginfo('url')?>/";</script>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
	<div class="w1">
		<div class="w2">
			<div id="wrap">
				<div id="header">
					<strong class="license-box">license</strong>
					<div class="header-area">
						<strong class="logo"><a href="<?php echo home_url('/'); ?>">Westcott towbars</a></strong>
						<span class="contact-info"><?php echo $westcott_theme_options['call_us_text']; ?></span>
						<ul id="slider">
							<li><img src="<?php bloginfo('template_directory'); ?>/images/slide01.png" alt="#" /></li>
							<li><img src="<?php bloginfo('template_directory'); ?>/images/slide02.png" alt="#" /></li>
							<li><img src="<?php bloginfo('template_directory'); ?>/images/slide03.png" alt="#" /></li>
						</ul>
					</div>
					<div class="header-section">
						<div class="box">
							<em><?php echo $westcott_theme_options['left_text']; ?></em>
						</div>

						<div class="top-append">
                                    <a id="btn-navbar_id" class="menu_icon btn btn-navbar collapse_nav">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </a>
                                    <div id="navbar-collapse" class="navbar-collapse bs-navbar-collapse collapse nav links pull-right" style="height: auto;" role="navigation">
                                        <?php wp_nav_menu(array('menu' => 'MainMenu', 'container' => false, 'menu_id' => 'nav')); ?>
                                    </div>
                                </div>
					</div>
				</div>
				<div id="main">