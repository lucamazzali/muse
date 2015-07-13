<?php
/*
Author: Net2b
URL: http://www.net2b.eu/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/


	/************* ACTIVE SIDEBARS ********************/

	/** Registriamo l'area widget . */
	add_action( 'widgets_init', 'inizializzazione_area_widget' );	 
	/** Fase di creazione dell'area widget. */
	function inizializzazione_area_widget() {
		// indichiamo la posizione come promemoria in questo commento, sotto l'header
		register_sidebar( array(
			'name' => __( 'Footer', 'Twenty Twelve' ),
			'id' => 'sotto-footer',
			'description' => __( 'Area widget sotto footer del tema', 'Twenty Twelve' ),
			'before_widget' => '<li id="%1$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		 ) );
	}

	// PLUGIN ACF REPEAT
	include_once( ABSPATH . 'wp-content/plugins/acf-repeater/acf-repeater.php' );


	//AUTOMATICALLY SELECTED CATEGORY ADD POST TYPE
	function reg_cat() {
		register_taxonomy_for_object_type('prodotti','eventi');
	}
	add_action('init', 'reg_cat');



	// CREO NUOVI FORMATI DI IMMAGINI

	
	// let's start by enqueuing our styles correctly
	function wptutsplus_admin_styles() {
	    wp_register_style( 'wptuts_admin_stylesheet', get_template_directory_uri().'/css/admin.css' );
	    wp_enqueue_style( 'wptuts_admin_stylesheet' );
	}
	add_action( 'admin_enqueue_scripts', 'wptutsplus_admin_styles' );


	// GET COORDINATE FROM ADDRESS
	function getCoordinates($address){

		$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
		$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
		$response = file_get_contents($url);
		$json = json_decode($response,TRUE); //generate array object from the response from the web
		return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);

	}

	function p_filter_categories( $categories ) {
	  if ( is_array( $categories ) ) {
	    foreach ( $categories as $i => $cat ) {
	       $categories[ $i ]->name = __( $cat->name );
	    }
	  } else {
	    $categories->name = __( $categories->name );
	  }
	  return $categories;
	}
	add_filter( 'get_the_categories', 'p_filter_categories', 10 );
	add_filter( 'get_the_terms', 'p_filter_categories', 10 );
	add_filter( 'get_term', 'p_filter_categories', 10 );


	// remove js acf
	add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );

	function my_deregister_javascript() {
		wp_deregister_script( 'acf-input' );
	}
	


	// includo il file js per advanced custom field solo nel post.php
	// AD OGNI UPLOAD DEL PLUGIN ACF RICORDARSI DI COPIARE IL FILE INPUT.MIN.JS NELLA CARTELLA JS/ACF DEL PROPRIO TEMA 
	function my_enqueue_post($hook) {
	    if ( 'post.php' != $hook ) {
	        return;
	    }
	    wp_register_script( 'my_custom_script', get_template_directory_uri() . '/js/acf/input.min.js', array('jquery') );
    	wp_enqueue_script( 'my_custom_script' );
    	wp_register_script( 'my_custom_script2', plugin_dir_url() . 'acf-repeater/js/input.js', array('jquery') );
    	wp_enqueue_script( 'my_custom_script2' );
    	wp_register_script( 'my_custom_script3', plugin_dir_url() . 'acf-qtranslate/assets/common.js', array('jquery') );
    	wp_enqueue_script( 'my_custom_script3' );
	}
	add_action( 'admin_enqueue_scripts', 'my_enqueue_post', 1 );

	function my_enqueue_new($hook) {
	    if ( 'post-new.php' != $hook ) {
	        return;
	    }
	    wp_register_script( 'my_custom_script', get_template_directory_uri() . '/js/acf/input.min.js', array('jquery') );
    	wp_enqueue_script( 'my_custom_script' );
    	wp_register_script( 'my_custom_script2', plugin_dir_url() . 'acf-repeater/js/input.js', array('jquery') );
    	wp_enqueue_script( 'my_custom_script2' );
    	wp_register_script( 'my_custom_script3', plugin_dir_url() . 'acf-qtranslate/assets/common.js', array('jquery') );
    	wp_enqueue_script( 'my_custom_script3' );
	}
	add_action( 'admin_enqueue_scripts', 'my_enqueue_new', 1 );




?>