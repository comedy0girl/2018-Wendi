<?php 

if (is_admin())
{
	add_action('load-post.php', 'init_page_settings_metabox');
	add_action('load-post-new.php', 'init_page_settings_metabox');
}

function init_page_settings_metabox()
{

	add_action('add_meta_boxes', 'add_page_metabox');
	add_action('save_post', 'save_page_settings_metabox', 10, 2);
}

function add_page_metabox()
{

	add_meta_box(
		'page_settings',
		__('Page Settings', 'text_domain'),
		'render_page_settings_metabox',
		'page',
		'advanced',
		'default'
	);

}


function render_page_settings_metabox($post)
{ 
	// Add nonce for security and authentication.
	wp_nonce_field('page_settings_nonce_action', 'page_settings_nonce');

	// Retrieve an existing value from the database.
	$project_title = get_post_meta($post->ID, 'project_title', true);
	$season = get_post_meta($post->ID, 'season', true);
	$episode = get_post_meta($post->ID, 'episode', true);
	$airdate = get_post_meta($post->ID, 'airdate', true);
	 


	$project_title = empty($project_title) ? '' : $project_title;
	$season = empty($season) ? '' : $season;
	$episode = empty($episode) ? '' : $episode;
	$airdate = empty($airdate) ? '' : $airdate;


	 echo '<style type="text/css">.hide {display: none;}</style>';

	// Form fields.
	echo '<table class="form-table">';


	echo '	<tr>';
	echo '		<th><label for="project_title">' . __('Project', 'text_domain') . '</label></th>';
	echo '		<td>';
	echo '			<textarea id="project_title" name="project_title" class="regular-text" rows="1" >' . $project_title . '</textarea>';
	echo '			<p class="description"></p>';
	echo '		</td>';
	echo '	</tr>';

	echo '	<tr>';
	echo '		<th><label for="season">' . __('Season', 'text_domain') . '</label></th>';
	echo '		<td>';
	echo '			<textarea id="season" name="season" class="regular-text" rows="1" >' . $season . '</textarea>';
	echo '			<p class="description"></p>';
	echo '		</td>';
	echo '	</tr>';

	echo '	<tr>';
	echo '		<th><label for="episode">' . __('episode', 'text_domain') . '</label></th>';
	echo '		<td>';
	echo '			<textarea id="episode" name="episode" class="regular-text" rows="1" >' . $episode . '</textarea>';
	echo '			<p class="description"></p>';
	echo '		</td>';
	echo '	</tr>';

	echo '	<tr>';
	echo '		<th><label for="airdate">' . __('airdate', 'text_domain') . '</label></th>';
	echo '		<td>';
	echo '			<textarea id="airdate" name="airdate" class="regular-text" rows="1" >' . $airdate . '</textarea>';
	echo '			<p class="description"></p>';
	echo '		</td>';
	echo '	</tr>';



	echo '</table>';
}

function save_page_settings_metabox($post_id, $post)
{

	// Add nonce for security and authentication.
	$nonce_name = $_POST['page_settings_nonce'];
	$nonce_action = 'page_settings_nonce_action';

	// Check if a nonce is set.
	if (!isset($nonce_name))
	{
		return;
	}

	// Check if a nonce is valid.
	if (!wp_verify_nonce($nonce_name, $nonce_action))
	{
		return;
	}

	// Check if the user has permissions to save data.
	if (!current_user_can('edit_post', $post_id))
	{
		return;
	}

	// Check if it's not an autosave.
	if (wp_is_post_autosave($post_id))
	{
		return;
	}

	// Check if it's not a revision.
	if (wp_is_post_revision($post_id))
	{
		return;
	}

	// Sanitize user input.
	$project_title = empty($_POST['project_title']) ? '' : $_POST['project_title'];
	$season = empty($_POST['season']) ? '' : $_POST['season'];
	$episode = empty($_POST['episode']) ? '' : $_POST['episode'];
	$airdate = empty($_POST['airdate']) ? '' : $_POST['airdate'];

	// Update the meta field in the database.
	update_post_meta($post_id, 'project_title', $project_title);
	update_post_meta($post_id, 'season', $season);
	update_post_meta($post_id, 'episode', $episode);
	update_post_meta($post_id, 'airdate', $airdate);
}