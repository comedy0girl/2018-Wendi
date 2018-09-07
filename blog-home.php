<?php /*Template Name: Blog Home*/ ?>

<?php get_header(); ?>




<div class="twelve columns news-blog ">
	<div class="container"><?php
		query_posts( array( 'paged' => get_query_var('paged') ) ); 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			if (! $featured = get_the_post_thumbnail()) {
					$featured = get_the_content();
				}
				// extract post thumbail URL
				preg_match('/<img.*(src)="([^"]*)"/i', $featured, $matches);
				$thumb = $matches[2]; 
			if (!empty($thumb)) : ?>
			<div class="four columns the-post"> 	
				<div class="post-pic" style="background-image:url('<?php echo $thumb; ?>') ">
					<p class="tags"><?php the_time('F') ?> <?php the_time('j') ?> <?php the_time('Y')?> / <?php	
						$categories = get_the_category();
							if ( ! empty( $categories ) ) {
							    echo esc_html( $categories[0]->name );   
							} ?>
					</p>
				</div>
			
				<div class="post-inner-info">
					<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
					
					<p><a href="<?php echo get_permalink(); ?>">Read More</a></p>
				</div>
			</div><?php
	 		endif;
			endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p><?php 
		endif; ?>
	</div>
</div>





<?php get_footer(); ?> 





