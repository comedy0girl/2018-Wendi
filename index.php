<?php get_header(); ?>


<div class="twelve columns image-links">
	<div class="container">
		<div class="offset-by-one ten columns">
			<div class="four columns images" style="background-image: url('<?php bloginfo('template_url') ?>/assets/images/bio.jpg');">
				<div class="links-inner">
					<p>Twitter</p>
					<h3>About Wendi</h3>
				</div>
			</div>
			<div class="four columns images" style="background-image: url('<?php bloginfo('template_url') ?>/assets/images/insta.jpg');">
				<div class="links-inner">
					<p>Follow Wendi</p>
					<h3>On Twitter</h3>
				</div>
			</div>
			<div class="four columns images" style="background-image: url('<?php bloginfo('template_url') ?>/assets/images/twitter.jpg');">
				<div class="links-inner">
					<p>Follow Wendi</p>
					<h3>On Instagram</h3>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row twelve columns section-headers">
	<h2>Latest News</h2>
</div>

<div class="twelve columns news ">
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


<?php 
	include (TEMPLATEPATH . '/includes/_upcoming.php'); ?>


<div class="row twelve columns instagramDesktop">
		<h3> <span><i class="fa fa-instagram black"></i>  @wendimc_fansite</span></h3>
  		<div class="row twelve columns" id="instafeed">
   		 <!-- LightWidget WIDGET --><script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe id="instagram" src="//lightwidget.com/widgets/7cb700b4ad1253dd8f7c7c9a98c07256.html" id="lightwidget_7cb700b4ad" name="lightwidget_7cb700b4ad"  scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
		</div>
</div>



<?php get_footer(); ?> 





