<?php /*Template Name: Blog Home*/ ?>

<?php get_header(); ?>
<div class="row twelve columns website-title">
	<a href="/"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></a>
</div>

<div class="twelve columns news-blog ">
	<div class="container"><?php 
		$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		$args = array(
		    'posts_per_page' => get_option('posts_per_page'), 
		    'paged'          => $current_page 
		);
		query_posts( $args );
		$wp_query->is_archive = true;
		$wp_query->is_home = false; 
			while(have_posts()): the_post(); ?>	

			  	<div class="one-half column the-post "><?php
					if (! $featured = get_the_post_thumbnail()) {
						$featured = get_the_content();
					}
					
					// extract post thumbnail URI
					preg_match('/<img.*(src)="([^"]*)"/i', $featured, $matches);
					$thumb = $matches[2]; ?> 

				<?php if (!empty($thumb)) : ?>
				
					
			  		<?php 
					$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
			  		<div class="post-pic blog"style="background-image:url('<?php echo $thumb; ?>');">
			  				<div class="postInfo">
								<div class="postDate">
									<span><?php the_time('F') ?> <?php the_time('j') ?> <?php the_time('Y')?></span> / <span><?php	$categories = get_the_category();
									if ( ! empty( $categories ) ) {
									    echo esc_html( $categories[0]->name );   
									} 
								?></span>
								</div>
							</div>
			  		</div>
			  	<?php endif; ?>
				
			  		<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
						<a class="classic-button" href="<?= get_permalink(); ?>">Read More ></a>
				
					
			  	</div><?php 

			endwhile; ?>
	</div>
</div>

<div class="row twelve columns blog-navigation"><?php wp_pagenavi(); ?></div>

<?php get_footer(); ?> 