<?php /*Template Name:  Home PAge */ ?>
<?php get_header(); ?>

<div class="twelve columns">
	<div class="mobile-title">
		<h1>Wendi <span class="light">McLendon-Covey</span><span class="lighter"> Fansite</span></h1>
	</div>

	<div class="welcomeHero" >
		<div class="wendi" style="background-image: url('<?php bloginfo('template_url') ?>/assets/images/other-banner.png') ">
			 <div class="title hide" >
			
			<div class="title-holder">
				<img class="title-me" alt="Wendi McLendon-Covey Fansite" src="<?php bloginfo('template_url') ?>/assets/images/site-title.png">
				<!-- <h1><span class="main">Wendi</span><br>
				<span class="light">McLendon-Covey</span><br>
				<span class="fancy">Fansite</span></h1> -->
			</div>
		</div>
			
		</div> 
		
	
	
	</div>
	<div class="welcome-bottom">
		
		<p>Your Fansite Source For Everything Wendi!</p>
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
						<div class="postDate">
							<span><?php the_time('F') ?> <?php the_time('j') ?> <?php the_time('Y')?></span> / <span><?php	$categories = get_the_category();
							if ( ! empty( $categories ) ) {
							    echo esc_html( $categories[0]->name );   
							} 
						?></span>
						</div>
						

						<a class="classic-button" href="<?= get_permalink(); ?>">Read More ></a>
						
	  				</div>
	
			  	</div><!-- end of post three columns --><?php 

			endwhile; ?>

		<div class="row twelve columns section-more">
			<a class="section-btn" href="/news/">More News ></a>
		</div>
	</div><?php 
	else : ?>
			<p><?php __('No News'); ?></p><?php 
	endif; ?>
</div><?php 
	include (TEMPLATEPATH . '/includes/_upcoming.php'); 

	include (TEMPLATEPATH . '/includes/_follow-wendi.php'); ?>


	<div class="row twelve columns instagram no-mobile">
			<h3> <span><i class="fa fa-instagram black"></i>  <a href="https://www.instagram.com/wendimc_fansite/">@wendimc_fansite</a></span></h3>
	  		<div class="row twelve columns" id="instafeed">
	  			<!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe id="instagram" src="https://cdn.lightwidget.com/widgets/219a4187096e547db8df110834f085ff.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
	   		
			</div>
	</div>
</div>

<?php get_footer(); ?> 
