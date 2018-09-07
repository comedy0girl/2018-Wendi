<?php /*Template Name: lower-gallery*/ ?>

<?php get_header(); ?>
		<div class="inside galleryContent">
			<div class="container">
				<div class="nine columns galleryContainer">

                 <?php if ( have_posts() ) : 
                    while ( have_posts() ) : 
                            the_post(); 
                                 the_content(); 
                     endwhile; else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>

					<!-- <div class="slider">
						<?php 
						$images = get_attached_media('image', $post->ID);
						foreach($images as $image) { ?>
						   	<div>
								<img src="<?php echo wp_get_attachment_image_src($image->ID,'full')[0]; ?>" />	
							</div><?php 
						} ?>
					</div> -->
				</div>
				<div class="three columns post-sidebar">
					<p class="sidebar-title">Wendi McLendon-Covey Fansite</p>
					<div class="sidebar-image">
						<img src="<?php bloginfo('template_url') ?>/assets/images/wendi-sidebar.png">
					</div>
				</div>
			</div>
	</div><!-- gallery container -->


<?php get_footer(); ?>