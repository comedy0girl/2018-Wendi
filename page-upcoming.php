<?php

    /* Template Name: Upcoming Episodes */
 
get_header(); ?>
<div class="row twelve columns website-title">
   <a href="/"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></a>
</div>

<div class="twelve columns standard-content">

        <div class="offset-by-one ten columns content-inner">
  
            <div class="standard-inner">
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


<?php get_footer(); ?>