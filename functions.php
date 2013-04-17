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



function delete_news_transients() {
  	for ($i=1; $i < 5; $i++) { 
  		delete_transient('news_archive_query_' . $i);
  		delete_transient('flagship_photo_archive_query_' . $i);
  		delete_transient('flagship_article_archive_query_' . $i);
  		delete_transient('flagship_video_archive_query_' . $i);
  	}
	delete_transient('by_the_numbers_query');
	delete_transient('flagship_news_query'); 
	delete_transient('flagship_video_query');
	delete_transient('flagship_photo_query');
	delete_transient('research_query');
	delete_transient('dean_letter_query');
	delete_transient('dean_letter_archive_query');
}
 
add_action('save_post','delete_news_transients');

function delete_people_transients() {
	if($_POST[post_type] == 'people') {
		delete_transient('flagship_leadership_query');
		delete_transient('flagship_dean_staff_query');
	}
}

if(post_type_exists('people')) {		
	add_action('save_post','delete_people_transients'); 
}

function delete_studyfields_transients() {
	if($_POST[post_type] == 'studyfields') {
		delete_transient('flagship_studyfields_query');
		delete_transient('jump_menu_query');
		delete_transient('jump_menu_art_query');
		delete_transient('jump_menu_pci_query');
	}
}

if(post_type_exists('studyfields')) {		
	add_action('save_post','delete_studyfields_transients'); 
}

function delete_page_transients() {
	if($_POST[post_type] == 'page') {
		delete_transient('undergraduate_research_query');
		delete_transient('graduate_research_query');
	}
}
add_action('save_post','delete_page_transients');


?>