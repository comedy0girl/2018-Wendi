<?php get_header(); ?>

<div class="twelve columns">
	<div class="welcomeHero">
		<div class="three columns wendi">
			<image src="<?php bloginfo('template_url') ?>/assets/images/wendi-cutout.png">	
		</div>
		<div class="nine columns title">
			<h1>Wendi</h1>
			<span class="light">McLendon-Covey</span><br>
			<span class="fancy">Fansite</span>
		</div>
	
	</div>
<div class="welcome-bottom">
	<p>Your Fansite Source For Everything Wendi!</p>
</div>



<div class="twelve columns news" id="latest-news">
	<div class="large-behind-text">NEWS</div>


		<h3 class="section-title">The Latest</h3><?php
		query_posts( array( 'paged' => get_query_var('paged') ) ); 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div class="three columns the-post">
				<a href="<?php echo get_permalink(); ?>"> 	
					<div class="post-inner-info">
						<p class="tags"><?php the_time('F') ?> <?php the_time('j') ?> <?php the_time('Y')?> / <?php	
							$categories = get_the_category();
								if ( ! empty( $categories ) ) {
								    echo esc_html( $categories[0]->name );   
								} ?>
						</p>
						<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>

						<p><?php echo the_excerpt() ?></p>
						
					</div>
				</a>
			</div><?php
	 		
			endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p><?php 
		endif; ?>

		<div class="row twelve columns section-more">
			<a class="section-btn" href="#">More News</a>
		</div>
</div>



<div class="row twelve columns image-links">
	<div class="large-behind-text">QUEEN WENDI</div>
	<div class="wow animated slideInLeft ten columns the-links">
		<h3 class="row section-title">Follow Wendi</h3>
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


<?php 
	include (TEMPLATEPATH . '/includes/_upcoming.php'); ?>


<div class="row twelve columns no-mobile">
		<h3> <span><i class="fa fa-instagram black"></i>  @wendimc_fansite</span></h3>
  		<div class="row twelve columns" id="instafeed">
   		 <!-- LightWidget WIDGET --><script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe id="instagram" src="//lightwidget.com/widgets/7cb700b4ad1253dd8f7c7c9a98c07256.html" id="lightwidget_7cb700b4ad" name="lightwidget_7cb700b4ad"  scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
		</div>
</div>
</div>



<?php get_footer(); ?> 





