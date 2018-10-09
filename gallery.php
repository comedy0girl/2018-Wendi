<?php /*Template Name: lower-gallery*/ ?>

<?php
$project_title = get_post_meta($post->ID, 'project_title', true);
	$season = get_post_meta($post->ID, 'season', true);
	$episode = get_post_meta($post->ID, 'episode', true);
	$airdate = get_post_meta($post->ID, 'airdate', true); ?>

<?php get_header(); ?>

		<div class="inside galleryContent">
			<div class="container">

				<div class="four columns post-sidebar">
					<div class="page-title">
						<h1>Wendi <span class="light">McLendon-Covey</span><span class="fancy"> Gallery</span></h1>
					</div>
					
					<div class="sidebar-image">
						<div class="gallery-box">
							<?php if (!empty($project_title)) : ?>
								<p>Project: <span><?php echo $project_title ?></span></p>
							<?php endif ?>
							<?php if (!empty($season)) : ?>
								<p>Season: <span><?php echo $season ?></span></p>
							<?php endif ?>
							<?php if (!empty($episode)) : ?>
								<p>Episode: <span><?php echo $episode ?></span></p>
							<?php endif ?>
							<?php if (!empty($airdate)) : ?>
								<p>Airdate: <span><?php echo $airdate ?></span></p>
							<?php endif ?>

						</div>
					</div>
				</div>

				
				<div class="eight columns galleryContainer">

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

	<div class="row twelve posts-more ">
		<h3 class="bottom-section-title">Wait, there's more...</h3>
		<div class="more-inner"><?php
			$pagelist = get_pages('sort_column=menu_order&sort_order=asc');
			$pages = array();
			foreach ($pagelist as $page) {
			   $pages[] += $page->ID;
			}

			$current = array_search(get_the_ID(), $pages);
			$prevID = $pages[$current-1];
			$nextID = $pages[$current+1];
			?>
			<?php if (!empty($prevID)) { ?>
			<div class="one-half column left">
				<p>Previous Gallery: <a href="<?php echo get_permalink($prevID); ?>"
			  title="<?php echo get_the_title($prevID); ?>"><?php echo get_the_title($prevID); ?>	</a></p>
			</div>
			<?php }
			if (!empty($nextID)) { ?>
				<div class="one-half column right">
						<p>Next Gallery: <a href="<?php echo get_permalink($nextID); ?>" 
				 	title="<?php echo get_the_title($nextID); ?>"><?php  echo get_the_title($nextID); ?></a></p>
				</div>
			<?php } ?>
			
		</div>
	</div>



<?php get_footer(); ?>