<?php get_header(); ?>
	
	<?php  
	    $structure = get_post_meta($post->ID, 'ecpt_structure', true);
	    
	    if ( $structure == 'department' ) {
	    	locate_template('parts-department.php', true, false);
	    } 
	    
	    if ( $structure == 'interdisciplinary' ) {
	    	locate_template('parts-interdisciplinary.php', true, false);
	    } 
	    
	    if ( $structure == 'arts' ) {
	    	locate_template('parts-arts.php', true, false);
	    } 
	?>

<?php get_footer(); ?>
