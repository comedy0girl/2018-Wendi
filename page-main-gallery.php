<?php /*Template Name: Main Gallery*/ ?>


<?php get_header(); ?>
<div class="row page-title">
	<h1>Wendi <span class="light">McLendon-Covey</span><span class="lighter"> Gallery</span></h1>
</div> 

<div class="galleryContent">
	<div class="container">
		<div class="twelve columns main-galleryContainer">

         <?php if ( have_posts() ) : 
            while ( have_posts() ) : 
                    the_post(); 
                         the_content(); 
             endwhile; else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
		</div>
	</div>
</div><!-- gallery container -->


	

<?php get_footer(); ?>