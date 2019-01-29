<?php /*Template Name: lower-gallery*/ ?>

<?php get_header(); ?>
	<div class="row twelve columns website-title"><a href="/gallery"><h1>Wendi <span class="light">McLendon-Covey</span><span class="lighter"> Gallery</span></h1></a></div>

	<div class="ttwelve columns inside galleryContent">
			
			<div class="twelve columns galleryContainer">

             <?php if ( have_posts() ) : 
                while ( have_posts() ) : 
                        the_post(); 
                             the_content(); 
                 endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
			</div>
		
	</div>

	<div class="row twelve columns posts-more">
		<h3 class="section-title">Wait, there's more...</h3>
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