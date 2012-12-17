<?php

// Adding WP 3+ Functions & Theme Support
function flagship_theme_support() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 125, 125, true );   // default thumb size
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


/*******************NAVIGATION & MENU FUNCTIONS******************/

// Menu output mods
class foundation_navigation extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "", $depth ) : '';
			
			$class_names = $value = '';
			
			// If the item has children, add the dropdown class for bootstrap
			if ( $args->has_children ) {
				$class_names = "has-flyout ";
			}
						
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
			$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';
           
           	$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           	$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           	$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           	$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           	$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
           	// if the item has children add these two attributes to the anchor tag
           	if ( $args->has_children ) {
				$attributes .= 'data-toggle="dropdown"';
			}

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
            
function start_lvl(&$output, $depth) {
	$output .= "\n<ul class=\"flyout up\">\n";
}
            
      	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
      	    {
      	        $id_field = $this->db_fields['id'];
      	        if ( is_object( $args[0] ) ) {
      	            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
      	        }
      	        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
      	    }
      	
            
}

// Add a class to the wp_page_menu fallback
function foundation_page_menu_class($ulclass) {
	return preg_replace('/<ul>/', '<ul class="nav-bar">', $ulclass, 1);
}

add_filter('wp_page_menu','foundation_page_menu_class');
	
class mobile_select_menu extends Walker_Nav_Menu{
    function start_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
    }

    function end_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children closing tag
    }

    function start_el(&$output, $item, $depth, $args){
      // add spacing to the title based on the depth
      $item->title = str_repeat("&nbsp;", $depth * 4).$item->title;

      parent::start_el(&$output, $item, $depth, $args);

      // no point redefining this method too, we just replace the li tag...
      $output = str_replace('<li', '<option value="'. esc_attr( $item->url        ) .'"', $output);
    }

    function end_el(&$output, $item, $depth){
      $output .= "</option>\n"; // replace closing </li> with the option tag
    }
}

/*******************CSS HELPERS******************/
//to generate Slug as a class - useful for background images
function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}



?>