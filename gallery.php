<?php /*Template Name: lower-gallery*/ ?>

<?php get_header(); ?>
	<div class="row twelve columns website-title">
		<a href="/"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></a>
	</div><?php 
		include (TEMPLATEPATH . '/includes/_project.php'); ?> 
	<div class="twelve columns inside galleryLower">
		<div class="gallery-lower">
            <?php if ( have_posts() ) : 
                while ( have_posts() ) : 
                        the_post(); 
                             the_content(); 
                 endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
		</div>
		<div class="row twelve columns related-pages"><?php 
          $otherpages = do_shortcode('[wpb_childpages]');
              if($otherpages !== '') { 

             
                echo do_shortcode(" [wpb_childpages]");
          } ?>
    
      </div>
	</div>
	<div class="row twelve columns gallery-more">
	
		<div class="more-gallery-inner">
			<div class="row twelve columns gallery-more">
				<div class="more-gallery-inner"><?php

				$ancestors = get_post_ancestors( $post->ID );
				/* Get the top Level page->ID count base 1, array base 0 so -1 */ 
				$parent = ($ancestors) ? $ancestors[0]: $post->ID;
				$pagelist = get_pages('child_of='. $parent .'&sort_column=menu_order&sort_order=asc');
				$pages = array();
				foreach ($pagelist as $page) {
				   $pages[] += $page->ID;
				}
				$current = array_search(get_the_ID(), $pages);
				$prevID = ( isset($pages[$current-1]) ) ? $pages[$current-1] : '';
				$nextID = ( isset($pages[$current+1]) ) ? $pages[$current+1] : '';
				?>


				    <?php if (!empty($prevID)) { ?>
				    <div class="one-half column left">
				     <p>Previous: <a href="<?php  echo get_permalink($prevID); ?>"
				      title="<?php  echo get_the_title($prevID); ?>" class="previous-page"> <?php  echo get_the_title($prevID); ?></a></p>
				    </div>

				    <?php }
				    if (!empty($nextID)) { ?>
				    <div class="one-half column right">
				     <p>Next: <a href="<?php echo get_permalink($nextID); ?>" 
				     title="<?php  echo get_the_title($nextID); ?>" class="next-page"> <?php  echo get_the_title($nextID); ?></a></p>
				    </div>
				    <?php } ?>
	
	    
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>