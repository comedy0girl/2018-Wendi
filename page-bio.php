<?php /*Template Name: Biography*/ ?>


<?php get_header(); ?>
	<div class="row page-title">
		<div class="row twelve columns website-title">
			<a href="/"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></a>
		</div>
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
	</div>
	<div class="row twelve columns fast-facts">
		<div  class="large-behind-text">
			<img class="bg-text" src="<?php bloginfo('template_url') ?>/assets/images/queen.png">
		</div>
		<h3 class="section-title">Wendi Fast Facts</h3>
		<div class="facts-inner">
			<div class="four columns left">
				<ul>
					<li>Birthday: October 10th</li>
					<li>Birthplace: Bellflower, California</li>
				</ul>
			</div>
			<div class="four columns center">
				<ul>
					<li>Twitter: <a href="https://twitter.com/wendimclendonco">@wendimclendonco</a></li>
					<li>Instagram: <a href="https://www.instagram.com/wendi_mclendon_covey/">@wendi_mclendon_covey/</a></li>
					<li>Tumblr: <a href="http://wendimc.tumblr.com/">wendimc.tumblr.com/</a></li>
				</ul>
			</div>
			<div class="four columns right">
				<ul>
					<li>IMDB: <a href="https://www.imdb.com/name/nm1018488/"> Profile</a></li>
					<li>Wikipedia: <a href="https://en.wikipedia.org/wiki/Wendi_McLendon-Covey"> Page</a></li>
				</ul>
			</div>
		</div>
	</div>

<?php get_footer(); ?>