<?php
/*
Template Name: Search Page
*/

get_header(); ?>

<div class="row page-title">
	<a href="/"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></a>
</div> 


<div class="page-general">
	<div class="container">


		
		<div class="twelve columns generic-page"><?php
		    global $query_string;
		    $query_args = explode("&", $query_string);
		    $search_query = array();

		    foreach($query_args as $key => $string) {
		      $query_split = explode("=", $string);
		      $search_query[$query_split[0]] = urldecode($query_split[1]);
		    } // foreach

		    $the_query = new WP_Query($search_query);
		    if ( $the_query->have_posts() ) : 
		    ?>
		    <!-- the loop -->

		    <ul>    
		    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		        <li>
		            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		        </li>   
		    <?php endwhile; ?>
		    </ul>
		    <!-- end of the loop -->

		    <?php wp_reset_postdata(); ?>

		<?php else : ?>
		    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>



						<?php
			global $wp_query;
			$total_results = $wp_query->found_posts;
			?>

		</div>
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();