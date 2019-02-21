
<div class="row twelve columns project-info"><?php
	if( get_field('project_title') ): ?>
		<h4><?php the_field('project_title'); ?></h4><?php 
  	endif; ?>  
  	<ul><?php 
  		if( get_field('character_name') ): ?>
  			<li><span>Character:</span> <?php the_field('character_name'); ?></li><?php
  		endif; 
  		if( get_field('episode') ): ?>
  			<li><span>Episode:</span> <?php the_field('episode'); ?></li><?php 
  		endif;
  		if( get_field('air_date') ): ?>
  			<li><span>Air Date:</span> <?php the_field('air_date'); ?></li><?php 
  		endif; 
  		if( get_field('release_date') ): ?>
  			<li><span>Release Date:</span> <?php the_field('release_date'); ?></li><?php
  		endif; 
  		if( get_field('official_site') ): ?>
  			<li><span>Official Site:</span> <a href="<?php the_field('official_site'); ?>"><?php the_field('official_site'); ?></a></li><?php
  		endif; ?>
  	</ul>
</div>


