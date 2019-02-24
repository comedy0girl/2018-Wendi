<?php get_header(); ?>
    <div class="row twelve columns website-title">
        <a href="/"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></a>
    </div>

	<div class="news-container twelve columns">
        <div class="twelve columns news-inner"><?php 
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
        </div>
        <div class="share-the-love">
            <?php echo wpfai_social(); ?>
        </div>


        <div class="row twelve posts-more ">
        <h3 class="section-title">Carry On....</h3>
        <div class="more-inner">

            <div class="one-half column left">
                <div class="post-previous">
                   
                    <p><?php previous_post_link(); ?> </a></p>
                </div>

            </div>
            <div class="one-half column right">
                <div class="post-next">
                    
                    <p><?php next_post_link(); ?></a></p>
                </div>
            </div
        </div>
    </div>
        

	</div>


	
<?php get_footer(); ?>