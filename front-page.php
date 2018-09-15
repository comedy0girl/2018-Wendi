<?php /*Template Name:  Home PAge */ ?>


<?php get_header(); ?>

<div class="twelve columns">
	<div class="welcomeHero">
		<div class="wendi">
			<image src="<?php bloginfo('template_url') ?>/assets/images/new-wen.png">	
		</div>
		<div class="title hide" >
			<h1>Wendi
			<span class="light">McLendon-Covey</span><br>
			<span class="fancy">Fansite</span></h1>
		</div>
	
	</div>
	<div class="welcome-bottom">
		<div class="mobile-title">Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></div>
		<p>Your Fansite Source For Everything Wendi!</p>
	</div>



	<div class="twelve columns news" id="latest-news">
		<div class="large-behind-text"><img src="<?php bloginfo('template_url') ?>/assets/images/news.png"></div>

			<h3 class="section-title">The Latest</h3><?php 
			query_posts( array(
   				'posts_per_page' => 4 )); 
			if( have_posts() ): while ( have_posts() ) : the_post(); ?>
				<div class="three columns the-post">
					<div class="post-inner-info">
							<p class="tags"><?php the_time('F') ?> <?php the_time('j') ?> <?php the_time('Y')?> / <?php	
								$categories = get_the_category();
									if ( ! empty( $categories ) ) {
									    echo esc_html( $categories[0]->name );   
									} ?>
							</p><?php 
							if (! $featured = get_the_post_thumbnail()) {
										$featured = get_the_content();
									}
									// extract post thumbail URL
									preg_match('/<img.*(src)="([^"]*)"/i', $featured, $matches);
									$thumb = $matches[2]; 
								if (!empty($thumb)) : ?>

									<div class="post-pic" style="background-image:url('<?php echo $thumb; ?>') ">
									</div><?php
								endif; ?>
							<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>

							<a href="<?php echo get_permalink(); ?>">Read More..</a>

							<!-- <p><?php echo the_excerpt() ?></p> -->

					</div>


					
	  			</div><?php 
			endwhile; ?>
		</div><?php 
		else : ?>

   			<p><?php __('No News'); ?></p><?php 
   		endif; ?>









						
				
			<div class="row twelve columns section-more">
				<a class="section-btn" href="#">More News</a>
			</div>
	</div><?php 
	include (TEMPLATEPATH . '/includes/_upcoming.php'); ?>


	<div class="row twelve columns image-links">
		<div  class="large-behind-text">
			<img class="bg-text" src="<?php bloginfo('template_url') ?>/assets/images/queen.png">
		</div>
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

	<div class="row twelve columns no-mobile">
			<h3> <span><i class="fa fa-instagram black"></i>  @wendimc_fansite</span></h3>
	  		<div class="row twelve columns" id="instafeed">
	   		 <!-- LightWidget WIDGET --><script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe id="instagram" src="//lightwidget.com/widgets/7cb700b4ad1253dd8f7c7c9a98c07256.html" id="lightwidget_7cb700b4ad" name="lightwidget_7cb700b4ad"  scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
			</div>
	</div>
</div>



<?php get_footer(); ?> 





