<?php get_header(); ?>
<div class="row twelve columns website-title"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></div>
	<div class="news-container twelve columns"><?php 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="offset-by-one nine columns single-post-text" ><?php
				$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
		  		<div class="post-pic"style="background-image:url('<?php echo $backgroundImg[0]; ?>');"></div>
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
			</div>
			<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

		
	</div><!--news container end -->


	<div class="row twelve posts-more "><?php
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
                    <div class="prev-img">
                        <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail'); ?></a>
                    </div>
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
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
                    <div class="prev-img">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?></a>
                    </div>
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                </div>
            </div><?php
                wp_reset_postdata();
            } 
            } ?>
        </div>
<?php get_footer(); ?>