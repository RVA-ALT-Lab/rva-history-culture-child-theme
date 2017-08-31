<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'extras', get_stylesheet_directory_uri() . '/js/extras.js', array(), $the_theme->get( 'Version' ), true );
}

/**
RVA History and Culture Custom Functions.php
**/

function create_posttype(){
	register_post_type('content-area', 
		array(
			'labels' => array(
					'name' => __('Content Area'), 
					'singular_name' => __('Content Area'),
				), 
				'supports' => array('title', 'editor','thumbnail', 'comments', 'revisions'), 
				'public' => true, 
				'has_archive' => true, 
				'rewrite' => array('slug' => 'content-area'), 
				'hierarchical' => true
			)
		); 

	register_post_type('work-sample', 
		array(
			'labels' => array(
					'name' => __('Work Sample'), 
					'singular_name' => __('Work Sample'),
				), 
				'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions'), 
				'public' => true, 
				'has_archive' => true, 
				'rewrite' => array('slug' => 'work-sample'), 
				'hierarchical' => true
			)
		); 
}

add_action('init', 'create_posttype'); 

function create_custom_taxonomy(){
	register_taxonomy(
		'content-area', 
		'work-sample', 
		array(
			'label' => 'Associated Area', 
			'hierarchical' => true
			)
		); 


	register_taxonomy(
		'work-sample-tags', 
		'work-sample', 
		array(
			'label' => 'Tags', 
			'singular_name' => 'Tag',  
			'hierarchical' => false, 
			'rewrite' => true, 
			'query_var' => true
			)
		); 
}

add_action('init', 'create_custom_taxonomy'); 
