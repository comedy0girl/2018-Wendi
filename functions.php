<?php	
	
	add_action( 'after_setup_theme', 'setup' );
	add_action( 'init', 'register_my_menus' );
	add_filter( 'use_default_gallery_style', '__return_false' );
	add_shortcode('gallery', 'gallery_shortcode');
	add_theme_support( 'post-thumbnails' );

	function setup() {
		add_image_size( 'homepage-posts', 260, 400, true ); //(cropped)
		add_image_size( 'gallery', 175, 175, true); //(cropped)

		add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );

		function custom_image_sizes_choose( $sizes ) {
		    $custom_sizes = array(
		        'homepage-posts' => 'Home Page Posts',
		        'gallery' => 'Gallery'
		    );
		    return array_merge( $sizes, $custom_sizes );
		}
	}	

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

function wpb_list_child_pages( $atts = array() ) {
    $atts = shortcode_atts( array(
        'id'   => 0,
        'slug' => '',
    ), $atts );

    if ( $atts['slug'] ) {
        global $wpdb;

        $q = $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE post_name = %s", $atts['slug'] );
        $post_id = $wpdb->get_var( $q );

        if ( ! $post_id ) {
            return '';
        }
    } else {
        $post_id = absint( $atts['id'] );
    }

    $post = get_post( $post_id ); // WP_Post on success.
    $childpages = '';

    if ( $post && is_post_type_hierarchical( $post->post_type ) ) {
        $childpages = wp_list_pages( array(
            'child_of' => $post->ID,
            'title_li' => '',
            'echo'     => 0,
        ) );
    }

    if ( $childpages ) {
        $childpages = '<ul>' . $childpages . '</ul>';
    }

    return $childpages;
}
add_shortcode( 'wpb_childpages', 'wpb_list_child_pages' );

?>