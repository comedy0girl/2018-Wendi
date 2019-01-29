<?php	
	
	add_action( 'after_setup_theme', 'setup' );
	add_action( 'init', 'register_my_menus' );
	add_filter( 'use_default_gallery_style', '__return_false' );
	add_shortcode('gallery', 'gallery_shortcode');

	add_theme_support('post-thumbnails');
	if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'main-gallery-size', 175, 175, array('center', 'center') ); //(cropped)
	}
	add_filter( 'image_size_names_choose', 'my_custom_sizes' );
	function my_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
	'main-gallery-size' => __( 'Main Gallery Thumb' ),
	) );
	}
	//deactivate WordPress function
	add_shortcode('gallery', 'gallery_shortcode');

	function register_my_menus() {
		register_nav_menus(
		    array(
		    	'header-menu' => __( 'Header Menu' ),
		      	'footer-menu' => __( 'Footer Menu' )
		    )
		);
	}

    // add arrows to menu parent 
    function oenology_add_menu_parent_class( $items ) {
     
     $parents = array();
     foreach ( $items as $item ) {
     if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
     $parents[] = $item->menu_item_parent;
     }
     }
     
     foreach ( $items as $item ) {
     if ( in_array( $item->ID, $parents ) ) {
     $item->classes[] = 'has-children';
     }
     }
     
     return $items;
    }
    add_filter( 'wp_nav_menu_objects', 'oenology_add_menu_parent_class' );


	//   Add responsive container to embeds
	// /* ------------------------------------  
	function alx_embed_html( $html ) {
	    return '<div class="video-container">' . $html . '</div>';
	}
	function wpse_allowedtags() {
    // Add custom tags to this string
        return '<script>,<style>,<iframe>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<video>,<audio>'; 
    }


    //widgets
	function footer_left() {

		register_sidebar( array(
			'name'          => 'Footer Left',
			'id'            => 'footer-left',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="rounded">',
			'after_title'   => '</h2>',
		) );

	}
	add_action( 'widgets_init', 'footer_left' );

	function footer_right() {
	add_action( 'widgets_init', 'arphabet_widgets_init' );
	register_sidebar( array(
			'name'          => 'Footer Right',
			'id'            => 'footer-right',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="rounded">',
			'after_title'   => '</h2>',
		) );

	}
	add_action( 'widgets_init', 'footer_right' );

	function goldbergs_upcoming() {
	add_action( 'widgets_init', 'arphabet_widgets_init' );
	register_sidebar( array(
			'name'          => 'Goldbergs Home Page',
			'id'            => 'goldbergs_upcoming',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="section-title">',
			'after_title'   => '</h3>',
		) );

	}
	add_action( 'widgets_init', 'goldbergs_upcoming' );