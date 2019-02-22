<?php /*Template Name: Main Gallery*/ ?>


<?php get_header(); ?>
<div class="row twelve columns website-title">
    <a href="/"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></a>
</div>

<div class="galleryContent">
	<div class="nine columns main-galleryContainer">

     <?php if ( have_posts() ) : 
        while ( have_posts() ) : 
                the_post(); 
                     the_content(); 
         endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
	</div>

   
    <div class="three columns gallery-sidebar">
        <div class="page-title">
            <h5><span class="fancy"> Gallery</span></h5>
        </div><?php
        if(is_page()) {
            //Assuming current working page is the parent
            //
            $the_parent_id = $post->ID;
            //Otherwise get the greatest ancestor id
            //
            
            if(! empty($post->ancestors))
            {
                $the_parent_key = max(array_keys($post->ancestors));
                $the_parent_id = $post->ancestors[$the_parent_key];
            }
            
            //First, get all of the pages
            //
            $all_wp_pages = get_pages();
            //Get all of the children relative to the greatest ancestor
            //
            $page_services_children = get_page_children($the_parent_id, $all_wp_pages);
            
            $page_walk_defaults = array();
            $page_walk_defaults['depth'] = 1;
            $page_walk_defaults['show_date'] = '';
            $page_walk_defaults['date_format'] = get_option('date_format');
            $page_walk_defaults['child_of'] = 0;
            $page_walk_defaults['exclude'] = '';
            $page_walk_defaults['title_li'] = '';
            $page_walk_defaults['echo'] = 0;
            $page_walk_defaults['authors'] = '';
            $page_walk_defaults['sort_column'] = 'post_date';
            $page_walk_defaults['link_before'] = '';
            $page_walk_defaults['link_after'] = '';
            $page_walk_defaults['walker'] = '';
            $output = '';
            $output .= '<ul>';
            
            // $output .= '<li class="top-level">'.get_the_title($the_parent_id).'</li>';
            
            $output .= walk_page_tree($page_services_children, $page_walk_defaults['depth'], $the_parent_id, $page_walk_defaults);
            $output .= '</ul>';
            $output = apply_filters('wp_list_pages', $output, $page_walk_defaults);
            echo $output;
        } ?>
    </div>

<!--  <div class="row twelve columns gallery-more">
    
    <div class="more-gallery-inner"><?php
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
            <p>Previous: <a href="<?php echo get_permalink($prevID); ?>"
          title="<?php echo get_the_title($prevID); ?>"><?php echo get_the_title($prevID); ?>   </a></p>
        </div>
        <?php }
        if (!empty($nextID)) { ?>
            <div class="one-half column right">
                    <p>Next: <a href="<?php echo get_permalink($nextID); ?>" 
                title="<?php echo get_the_title($nextID); ?>"><?php  echo get_the_title($nextID); ?></a></p>
            </div>
        <?php } ?>
        
    </div>
</div> -->

</div><!-- gallery container -->

<?php get_footer(); ?>