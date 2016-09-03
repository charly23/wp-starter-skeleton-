<?php
/*****************************************************************
 * GLOBAL SETTINGS
 *****************************************************************
 * Global Variable declaration block
 *
 */
define('TEMPLATE_URL', get_bloginfo('template_url'));
define('TEMPLATE_DIR', get_template_directory());
define('BLOG_NAME', get_bloginfo('name'));
define('SITE_URL', get_bloginfo('url'));

register_nav_menu( 'primary', __( 'Primary Menu', 'edjeen' ) );

add_action( 'wp_enqueue_scripts', 'jeen_enqueue_script' );

function jeen_enqueue_script() {

	// Scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap-js', TEMPLATE_URL.'/js/bootstrap.min.js' );
	wp_enqueue_script( 'slick-min-js', TEMPLATE_URL.'/js/slick.min.js' );
	wp_enqueue_script( 'jeen-theme-script', TEMPLATE_URL.'/js/scripts.js' );


	// Styles
	wp_enqueue_style( 'bootstrap-css', TEMPLATE_URL.'/css/bootstrap.min.css' );
	wp_enqueue_style( 'jeen-style', TEMPLATE_URL.'/css/style.css' );
}

if ( !function_exists( 'jeen_register_rc' ) ) {
	/**
	 * Initiation for the Custom Post types used by the Jeen Theme is declared here
	 *
	 * @use $a_types for easy declaration.  Setup the array based on the pattern indicated by the Banner Custom Post Type
	 */
	function jeen_register_rc() {
		global $titan_custom_post_types;
		
		$a_types = array(
				/**
				 * Declare Banner Custom Post Type ( Use this as the template for declaration )
				 *
				 * @optoinal slug
				 * @optional supports
				 */
				array(
						'the_type'	=> 'banner-slide',
						'single'	=> 'Banner',
						'plural'	=> 'Banners',
						'slug'		=> ''
						// 'supports'	=> ''
				)
				
		);

		foreach ($a_types as $a_type) {
			// This will merge the defaults and the passed data
			$a_type = wp_parse_args($a_type, array(
				'the_type'		=> '',
				'single'		=> '',
				'plural'		=> '',
				'slug'			=> '',
				'supports'		=> array('title','editor','thumbnail','page-attributes'),
				'has_archive'	=> false
			));

			$a_labels = array(
					'name' 					=> _x($a_type['plural'], 'post type general name'),
					'singular_name' 		=> _x($a_type['single'], 'post type singular name'),
					'add_new' 				=> _x('Add New', $a_type['single']),
					'add_new_item' 			=> __('Add New ' . $a_type['single']),
					'edit_item' 			=> __('Edit ' . $a_type['single']),
					'new_item' 				=> __('New ' . $a_type['single']),
					'view_item' 			=> __('View ' . $a_type['single']),
					'search_items' 			=> __('Search ' . $a_type['plural']),
					'not_found' 			=>  __('No ' . $a_type['plural'] . ' found'),
					'not_found_in_trash'	=> __('No ' . $a_type['plural'] . ' found in Trash')
			);

			$a_rewrite = array(
					'slug'                => $a_type['slug'],
					'with_front'          => true,
					'pages'               => true,
					'feeds'               => true
			);

			$a_args = array(
					'labels' 		=> $a_labels,
					'public' 		=> true,
					'has_archive' 	=> $a_type['has_archive'],
					'rewrite'       => $a_rewrite,
					'supports' 		=> $a_type['supports']
			);

			register_post_type($a_type['the_type'], $a_args);
			$titan_custom_post_types[] = $a_type['the_type'];
		}
	}
}

add_action('init', 'jeen_register_rc', 1);
	
?>