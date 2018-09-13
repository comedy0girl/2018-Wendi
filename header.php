<?php include (TEMPLATEPATH . '/includes/_wrapper.php'); ?>
    
<header >
	<div class="row twelve columns menu"><?php
		include (TEMPLATEPATH . '/includes/_nav.php'); ?>
	</div>
</header>

<head>
	
</head>

<?php
	$post_id = $page->ID;
	
if ( have_posts() ) : while ( have_posts() ) : the_post();
	$project_title = get_post_meta($post->ID, 'project_title', true);
	$season = get_post_meta($post->ID, 'season', true);
	$episode = get_post_meta($post->ID, 'episode', true);
	$airdate = get_post_meta($post->ID, 'airdate', true);
endwhile;
endif; ?>


