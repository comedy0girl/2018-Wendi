<?php get_header(); ?>
	<div class="news-container twelve columns"><?php 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php
				if (! $featured = get_the_post_thumbnail()) {
					$featured = get_the_content();
				}
				
				// extract post thumbnail URI
				preg_match('/<img.*(src)="([^"]*)"/i', $featured, $matches);
				$thumb = $matches[2]; ?>

			<div class="six columns post-side-image" style="background-image:url('<?php echo $thumb; ?>') ">
			</div>
			<div class="six columns single-post-text">
				<h1><?php the_title(); ?></h1>
				<p class="tags"><?php the_time('F') ?> <?php the_time('j') ?> <?php the_time('Y')?> / <?php	
					$categories = get_the_category();
						if ( ! empty( $categories ) ) {
						    echo esc_html( $categories[0]->name );   
						} ?>
				</p>
				<?php the_content(); ?>
			</div>
			<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

		
	</div><!--news container end -->
<?php get_footer(); ?>