<?php
function university_files() {
	wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i" rel="stylesheet');
	wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}

function university_features() {
	add_theme_support('title-tag'); //enable title tag in head
	add_theme_support('post-thumbnails'); // enable featured image
	//add_image_size('small-thumbnail',180,120,true)
	add_image_size('banner-img',920,210,true);
	register_nav_menus(array(
		'primary' => __( 'Primary Menu'),
		'footer' => __( 'Footer Menu'),
		'sidebar' => __('Sidebar Menu')
	));
}

function custom_excerpt_length() {
	return 20;
}

function customWidgets() {
	
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
	));
}

add_filter('excerpt_length','custom_excerpt_length');
add_action('wp_enqueue_scripts','university_files');
add_action('after_setup_theme', 'university_features');
add_action('widgets_init', 'customWidgets');
?>