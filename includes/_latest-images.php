<div class="twelve columns latest-images">
	<?php
$args = array( 'post_type' => 'attachment', 'posts_per_page' => -1, 'post_status' => 'any', 'post_parent' => 9, 'posts_per_page'   => 8 ); 
$attachments = get_posts( $args );
if ( $attachments ) {
    foreach ( $attachments as $post ) {
        setup_postdata( $post );
        echo '<div class="col-md-3 col-sm-3 col-xs-6">';

        $imageThumb = wp_get_attachment_image_src( $attachment->ID, 'full' );
        echo '<img class="img-thumbnail" src="'; echo $imageThumb[0]; echo '"/> '; 

        echo '</div>';
    }
    wp_reset_postdata();
}
?>
</div> 