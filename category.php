<?php
/* template name: Posts by Category! */
get_header(); ?>

        <div id="container">
            <div id="content" role="main">
                <p>Category: <?php single_cat_title(); ?></p>



                <?php $current_category = single_cat_title("", false); ?>

<?php

        $currentCategory = single_cat_title("", false);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query = array(
    'category_name' => $currentCategory,

    'paged'=> $paged,
    'posts_per_page' => '15'
);
$pageposts = new WP_Query($query); ?>

</div>



            </div><!-- #content -->
        </div><!-- #container -->

<?php get_footer(); ?>