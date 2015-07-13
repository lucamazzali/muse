<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->


	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>

			<?php // WordPress custom title script

			// is the current page a tag archive page?
			if (function_exists('is_tag') && is_tag()) { 

				// if so, display this custom title
				echo 'Tag Archive for &quot;'.$tag.'&quot; - '; 

			// or, is the page an archive page?
			} elseif (is_archive()) { 

				// if so, display this custom title
				wp_title(''); echo ' Archive - '; 

			// or, is the page a search page?
			} elseif (is_search()) { 

				// if so, display this custom title
				echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; 

			// or, is the page a single post or a literal page?
			} elseif (!(is_404()) && (is_single()) || (is_page())) { 

				// if so, display this custom title
				wp_title(''); echo ' - '; 

			// or, is the page an error page?
			} elseif (is_404()) {

				// yep, you guessed it
				echo 'Not Found - '; 

			}
			// finally, display the blog name for all page types
			bloginfo('name'); 

			?>

		</title>
		
		<meta name="description" content="<?php echo the_content(); ?>">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
    
    <!-- font -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
			<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Roboto:700' rel='stylesheet' type='text/css'>
    <![endif]-->
    
    <!--[if (lt IE 9) & (!IEMobile)]>
	    <link rel="stylesheet" href="../css/ie-example.css">
	    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	    <script src="//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
	    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6/html5shiv.min.js"></script>
	    <noscript><link rel="stylesheet" href="../css/mobile-example.css"></noscript>
    <![endif]-->

		<script src="https://maps.googleapis.com/maps/api/js?v=3.11&sensor=false" type="text/javascript"></script>

	</head>

	<body <?php body_class(); ?>>
		<header>
			<nav class="bourbon">

				<a class="brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
	      <?php wp_nav_menu(array(
					'container' => false,                           // remove nav container
					'container_class' => 'menu',                 // class of container (should you choose to use it)
					'menu' => __( 'principale', 'bonestheme' ),  // nav name
					'menu_class' => 'nav top-nav cf',               // adding custom nav class
					'theme_location' => 'main-nav',                 // where it's located in the theme
					'before' => '',                                 // before the menu
	    			'after' => '',                                  // after the menu
	    			'link_before' => '',                            // before each link
	    			'link_after' => '',                             // after each link
	    			'depth' => 0,                                   // limit the depth of the nav
					'fallback_cb' => ''                             // fallback function (if there is one)
				)); ?>
		  
		  </nav>
		  
			<!-- ?php get_template_part( 'page-template/anagrafica', 'anagrafica' ); ? --> 

	  </header>