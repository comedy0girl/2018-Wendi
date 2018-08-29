<?php get_header(); ?>
	<div class="news-container twelve columns">
		<div class="row nine columns content-post">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="single-post-wrapper">
					<h1><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
					
					<div class="postInfo">
						<div class="postDate">
							<span><?php the_time('F') ?> <?php the_time('j') ?> <?php the_time('Y')?></span>
						</div>
						<span><?php	$categories = get_the_category();
							if ( ! empty( $categories ) ) {
							    echo esc_html( $categories[0]->name );   
							} 
						?></span>
					</div>
					<div class="postImage">
						<?php
						if (! $featured = get_the_post_thumbnail()) {
							$featured = get_the_content();
						}
						
						// extract post thumbnail URI
						preg_match('/<img.*(src)="([^"]*)"/i', $featured, $matches);
						$thumb = $matches[2]; ?>
					</div>
						
					<?php the_content(); ?>

				</div><!-- post wrapper ends -->
			
			<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

			

		</div><!-- content post -->

	</div><!--news container end -->
<?php get_footer(); ?>