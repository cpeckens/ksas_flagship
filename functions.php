<?php

// Adding WP 3+ Functions & Theme Support
function flagship_theme_support() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 125, 125, true );   // default thumb size
	add_image_size( 'rss', 300, 150, true );
	add_image_size( 'bullet', 95, 95, true );
	add_theme_support( 'automatic-feed-links' ); // rss thingy
	add_theme_support( 'post-formats',      // post formats
		array( 
			'aside',   // title less blurb
			'gallery', // gallery of images
			'link',    // quick link to other site
			'image',   // an image
			'quote',   // a quick quote
			'status',  // a Facebook like status update
			'video',   // video 
			'audio',   // audio
		)
	);	
	add_theme_support( 'menus' );            
	register_nav_menus(                      
		array( 
			'main_nav' => 'The Main Menu',   
			'quick_links' => 'Quick Links',
			'footer_links' => 'Footer Links'
		)
	);	
}

// Initiate Theme Support
add_action('after_setup_theme','flagship_theme_support');

/*******************CSS HELPERS******************/
function add_flagship_categories() {
		wp_insert_term('Homepage', 'category',  array('description'=> '','slug' => 'homepage'));
		wp_insert_term('Dept Spotlight', 'category',  array('description'=> '','slug' => 'deptspotlight'));
		wp_insert_term('Student Voices', 'category',  array('description'=> '','slug' => 'voices'));
		wp_insert_term('Research Spotlight', 'category',  array('description'=> '','slug' => 'research'));
		wp_insert_term('By the Numbers', 'category',  array('description'=> '','slug' => 'numbers'));
	}
add_action('init', 'add_flagship_categories');
?>