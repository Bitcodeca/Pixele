<!doctype html>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- Chrome, Firefox OS, Opera and Vivaldi -->
    <meta name="theme-color" content="#FE5E00">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#FE5E00">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#FE5E00">
		<title>Pixele</title>
		<link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_directory');?>/img/favicon.ico">
		<?php wp_head(); ?>
	</head>
		
	<body>
    <header>
      <div class="navbar-fixed">
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <div class="container-fluid">
                <a href="#!" class="brand-logo">
                    <img src="<?php echo get_bloginfo('template_directory');?>/img/logosolo4.png" class="responive-img">
                </a>
                <a href="#" data-activates="mobile-demo" class="button-collapse waves-effect waves-red color1">
                    <i class="fa fa-bars fa-3x" aria-hidden="true"></i>
                </a>
                
                <?php  wp_nav_menu( array( 'theme_location' => 'primary', 
                    'menu_id' => 'nav-mobile', 
                    'menu_class' => 'right hide-on-med-and-down', 
                    'walker' => new Materialize_Walker_Desktop_Nav_Menu() ) 
                    ); ?> 
                
                
                <?php  wp_nav_menu( array( 'theme_location' => 'primary', 
                    'menu_id' => 'mobile-demo', 
                    'menu_class' => 'side-nav  grey lighten-3', 
                    'walker' => new Materialize_Walker_Desktop_Nav_Menu() ) 
                    ); ?>
            </div>
        </nav>
      </div>
    </header>
        <!--
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
                <div class="navbar-brand"><img src="<?php //echo get_bloginfo('template_directory');?>/img/logosolo4.png" style="position:relative;"></div>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <?php  //wp_nav_menu(array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right', 'walker' => new Bootstrap_Walker_Nav_Menu() ) ); ?>
            </div>
        </div>
    </nav>
 -->