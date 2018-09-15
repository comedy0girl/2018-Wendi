<?php /*Template Name: Blog Home*/ ?>

<?php get_header(); ?>
<div class="row twelve columns website-title"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></div>

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

			  	<div class="four columns the-post "><?php 
					$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
			  		<div class="post-pic blog"style="background-image:url('<?php echo $backgroundImg[0]; ?>');">
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
				
			  		<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
				   
					<div class="the-excerpt">
					
						<a class="classic-button" href="<?= get_permalink(); ?>">Read More ></a>
					</div>
					
			  	</div><?php 






			endwhile; ?>
	</div>
</div>

<div class="row twelve columns blog-navigation"><?php wp_pagenavi(); ?></div>





<?php get_footer(); ?> 





