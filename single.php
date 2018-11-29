<?php get_header(); ?>
<div class="row twelve columns website-title"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></div>

	<div class="news-container twelve columns"><?php 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="single-post-text">
			
				<h1><?php the_title(); ?></h1>
				<div class="postInfo">
					<div class="postDate">
						<span><?php the_time('F') ?> <?php the_time('j') ?> <?php the_time('Y')?></span> / <span><?php	$categories = get_the_category();
						if ( ! empty( $categories ) ) {
						    echo esc_html( $categories[0]->name );   
						} 
					?></span>
					</div>
				</div>
				<?php the_content(); ?>
			</div><?php 
        endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p><?php 
        endif; ?>

        <div class="share-the-love">
            <?php echo wpfai_social(); ?>
        </div>


        <div class="row twelve posts-more ">
        <h3 class="section-title">Carry On....</h3>
        <div class="more-inner"><?php
            $prevPost = get_previous_post(true);
            $nextPost = get_next_post(true); ?>

            <div class="one-half column left"><?php 
            $prevPost = get_previous_post(true);
            if($prevPost) {
                $args = array(
                    'posts_per_page' => 1,
                    'include' => $prevPost->ID
                );
                $prevPost = get_posts($args);
                foreach ($prevPost as $post) {
                    setup_postdata($post); ?>
                <div class="post-previous">
                   
                    <p>Previous: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                </div>

            </div><?php
                wp_reset_postdata();
                } //end foreach
            } // end if
         
            if($nextPost) {
                $args = array(
                    'posts_per_page' => 1,
                    'include' => $nextPost->ID
                );
            $nextPost = get_posts($args);
            foreach ($nextPost as $post) {
                setup_postdata($post); ?>
            <div class="one-half column right">
                <div class="post-next">
                    
                    <p>Next:<a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></p>
                </div>
            </div><?php
                wp_reset_postdata();
            } 
            } ?>
        </div>
    </div>
        

	</div>


	
<?php get_footer(); ?>