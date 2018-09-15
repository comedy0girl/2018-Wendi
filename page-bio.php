<?php /*Template Name: Biography*/ ?>


<?php get_header(); ?>
	<div class="row page-title">
		<h1>Wendi <span class="light">McLendon-Covey</span><span class="lighter"></span></h1>
	</div>

	<div class="biography">
		<div class="container"><?php 
			$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

			<div class="six columns left" style="background-image:url('<?php echo $backgroundImg[0]; ?>');">
			</div>

			<div class="six columns right">
                 <?php if ( have_posts() ) : 
                    while ( have_posts() ) : 
                            the_post(); 
                                 the_content(); 
                     endwhile; else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
			</div>
		</div>
	</div><!-- gallery container -->
	
<?php get_footer(); ?>