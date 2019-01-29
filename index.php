<?php /*Template Name:  Home PAge */ ?>
<?php get_header(); ?>

<div class="twelve columns">
	<div class="mobile-title">
		<h1>Wendi <span class="light">McLendon-Covey</span><span class="lighter"> Fansite</span></h1>
	</div>

	<div class="welcomeHero">
		<div class="wendi">
			<image src="<?php bloginfo('template_url') ?>/assets/images/new-wen.png">	
		</div>
		<div class="title hide" >
			<image src="<?php bloginfo('template_url') ?>/assets/images/title.png">
			<!-- <h1><span class="main">Wendi</span><br/>
			<span class="light">McLendon-Covey</span><br>
			<span class="fancy">Fansite</span></h1> -->
		</div>
	
	</div>
	<div class="welcome-bottom">
		
		<p>Your Fansite Source For Everything Wendi!fasdfsadasf</p>
	</div>

	<div class="twelve columns news" id="latest-news">
		<div class="large-behind-text"><img src="<?php bloginfo('template_url') ?>/assets/images/news.png"></div>

			<h3 class="section-title">The Latest</h3><?php 
			query_posts( array(
   				'posts_per_page' => 3 )); 
			if( have_posts() ): while ( have_posts() ) : the_post(); ?>
				
				<div class="four columns the-post"><?php 
					$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
			  		
	  				<div class="post-inner-info">
						<?php
							if (! $featured = get_the_post_thumbnail()) {
								$featured = get_the_content();
							}
							
							// extract post thumbnail URI
							preg_match('/<img.*(src)="([^"]*)"/i', $featured, $matches);
							$thumb = $matches[2]; 

							if (!empty($thumb)) : ?>
						<div class="post-pic"style="background-image:url('<?php echo $thumb; ?>');">
						</div>

						<?php endif; ?>

						<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>

						<div class="the-excerpt">
							<a class="classic-button" href="<?= get_permalink(); ?>">Read More ></a>
						</div>
	  				</div>
	
			  	</div><!-- end of post three columns --><?php 

			endwhile; ?>

		<div class="row twelve columns section-more">
			<a class="section-btn" href="/news/">More News</a>
		</div>
	</div><?php 
	else : ?>
			<p><?php __('No News'); ?></p><?php 
	endif; ?>
</div><?php 
	include (TEMPLATEPATH . '/includes/_upcoming.php'); 

	include (TEMPLATEPATH . '/includes/_follow-wendi.php'); ?>


	<div class="row twelve columns instagram no-mobile">
			<h3> <span><i class="fa fa-instagram black"></i>  <a href="">@wendimc_fansite</a></span></h3>
	  		<div class="row twelve columns" id="instafeed">
	   		 <!-- LightWidget WIDGET --><script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe id="instagram" src="//lightwidget.com/widgets/7cb700b4ad1253dd8f7c7c9a98c07256.html" id="lightwidget_7cb700b4ad" name="lightwidget_7cb700b4ad"  scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
			</div>
	</div>
</div>

<?php get_footer(); ?> 
