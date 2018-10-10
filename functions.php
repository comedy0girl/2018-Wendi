<?php	
	
	add_action( 'after_setup_theme', 'setup' );
	add_action( 'init', 'register_my_menus' );
	add_filter( 'use_default_gallery_style', '__return_false' );
	add_shortcode('gallery', 'gallery_shortcode');

	function setup() {
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'homepage-posts', 260, 400, true );
		add_image_size( 'gallery', 150, 150, true );

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



// if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) : 
//     function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
//     $raw_excerpt = $wpse_excerpt;
//         if ( '' == $wpse_excerpt ) {
//             $wpse_excerpt = get_the_content('');
//             $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
//             $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
//             $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
//             $wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */
//             //Set the excerpt word count and only break after sentence is complete.
//                 $excerpt_word_count = 30;
//                 $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
//                 $tokens = array();
//                 $excerptOutput = '';
//                 $count = 0;
//                 // Divide the string into tokens; HTML tags, or words, followed by any whitespace
//                 preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);
//                 foreach ($tokens[0] as $token) { 
//                     if ($count >= $excerpt_length && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) { 
//                     // Limit reached, continue until , ; ? . or ! occur at the end
//                         $excerptOutput .= trim($token);
//                         break;
//                     }
//                     // Add words to complete sentence
//                     $count++;
//                     // Append what's left of the token
//                     $excerptOutput .= $token;
//                 }
//             $wpse_excerpt = trim(force_balance_tags($excerptOutput));
//                 $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . sprintf(__( 'Read more', 'wpse' ), get_the_title()) . '</a>'; 
//                 $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 
//                 //$pos = strrpos($wpse_excerpt, '</');
//                 //if ($pos !== false)
//                 // Inside last HTML tag
//                 //$wpse_excerpt = substr_replace($wpse_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
//                 //else
//                 // After the content
//                 $wpse_excerpt .= $excerpt_more; /*Add read more in new paragraph */
//             return $wpse_excerpt;   
//         }
//         return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
//     }
// endif; 
// remove_filter('get_the_excerpt', 'wp_trim_excerpt');
// add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt'); 


?>