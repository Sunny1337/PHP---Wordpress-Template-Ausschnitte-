<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//DE" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-
transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de">
	<head profile="http://gmpg.org/xfn/11">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo
	('charset'); ?>" />
	
	 <title><?php wp_title(); ?> - <?php bloginfo('name'); ?></title>
	
	 <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
     
	<script src="http://pstud8.mt.haw-hamburg.de/wp-content/themes/Remember Theme/lightbox/js/jquery-1.10.2.min.js"></script>
	<script src="http://pstud8.mt.haw-hamburg.de/wp-content/themes/Remember Theme/lightbox/js/lightbox-2.6.min.js"></script>
     <link href="http://pstud8.mt.haw-hamburg.de/wp-content/themes/Remember Theme/lightbox/css/lightbox.css" rel="stylesheet" />
   	 <?php wp_head(); ?>

	</head>
    
    <body>
    	
        <div id="wrapper">
    
        <div id="header">
        
       	<div id="logo"><a href="http://pstud8.mt.haw-hamburg.de"><img src="http://pstud8.mt.haw-hamburg.de/wp-content/uploads/2013/12/logo1.png" alt="remember Logo" width="90" height="80" class="alignleft size-full wp-image-41" /></a></div>
        
        
       <div id="navbar" class="navbar"> 
            
                <div class="nav-menu">
                <ul>
                   <?php wp_list_categories('orderby=name&exclude=10&title_li='); ?> 
                  </ul>
				</div>
<?php //wp_nav_menu( array( 'theme_location' => 'header-menu','menu' => 'Header Menu', 'menu_class' => 'nav-menu') ); ?>
            
       </div>
        
        </div><!-- header -->
    