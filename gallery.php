<?php /*Template Name: lower-gallery*/ ?>

<?php
$project_title = get_post_meta($post->ID, 'project_title', true);
	$season = get_post_meta($post->ID, 'season', true);
	$episode = get_post_meta($post->ID, 'episode', true);
	$airdate = get_post_meta($post->ID, 'airdate', true); ?>

<?php get_header(); ?>
<!-- <div class="row page-title">
	<h1>Wendi <span class="light">McLendon-Covey</span><span class="lighter"> Gallery</span></h1>
</div> -->

		<div class="inside galleryContent">
			<div class="container">
				<div class="eight columns galleryContainer">

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
				<div class="four columns post-sidebar">
					<div class="page-title">
						<h1>Wendi <span class="light">McLendon-Covey</span><span class="lighter"> Gallery</span></h1>
					</div>
					
					<div class="sidebar-image">
						<!-- <img src="<?php bloginfo('template_url') ?>/assets/images/wendi-sidebar.png"> -->

						<div class="gallery-box">
							<?php if (!empty($project_title)) : ?>
								<p>Project: <span><?php echo $project_title ?></span></p>
							<?php endif ?>
							<?php if (!empty($season)) : ?>
								<p>Season: <span><?php echo $season ?></span></p>
							<?php endif ?>
							<?php if (!empty($episode)) : ?>
								<p>Episode: <span><?php echo $episode ?></span></p>
							<?php endif ?>
							<?php if (!empty($airdate)) : ?>
								<p>Airdate: <span><?php echo $airdate ?></span></p>
							<?php endif ?>

						</div>
					</div>
				</div>
			</div>
	</div><!-- gallery container -->


<?php get_footer(); ?>