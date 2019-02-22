<?php /*Template Name: Articles Main*/ ?>


<?php get_header(); ?>
<div class="website-title">
    <a href="/"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></a>
</div>

<div class="articles-main">
	<div class="container">
    	<div class="twelve columns articles-main-container"><?php
 
            $args = array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'post_parent'    => $post->ID,
                'order'          => 'DESC'
             );
             
             
            $parent = new WP_Query( $args );
             
            if ( $parent->have_posts() ) : ?>
             
                <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
             
                    <div id="parent-<?php the_ID(); ?>" class="parent-page">

                        <div class="article-one">

                            <div class="tags"><?php the_time('F') ?> <?php the_time('j') ?> <?php the_time('Y')?>  <h4><a href="<?php the_permalink(); ?>" title=" <?php the_title(); ?>"><?php the_title(); ?></a></h4>
                            </div>   
                        </div>
             
                     
             
                    </div>
             
                <?php endwhile; ?>
             
            <?php endif; wp_reset_query(); ?>

		</div>
	</div>
</div><!-- gallery container -->


	

<?php get_footer(); ?>