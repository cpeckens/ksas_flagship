<?php
/*
Template Name: Page with Sidebar
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="row sidebar_bg radius10" id="opp">
	<div class="eight columns wrapper radius-left offset-topgutter">		
		<section class="content">
				<h2><?php the_title();?></h2>
					<?php if ( has_post_thumbnail()) { ?> 
						<div class="photo-page-left floatleft seven columns">
							<?php the_post_thumbnail('full',array('class'	=> "radius-topleft")); ?>
						</div>
					<?php } ?>
				<?php the_content(); ?>
		</section>
	</div>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>	
	
	<div class="four columns" id="sidebar"> <!-- Begin Sidebar -->
		<div class="row">
		<!-- Page Specific Sidebar -->
		<?php if ( get_post_meta($post->ID, 'ecpt_page_sidebar', true) ) { 
				echo apply_filters('the_content', get_post_meta($post->ID, 'ecpt_page_sidebar', true));
			} ?>
		</div> <!--End Dept Nav Links -->
		</div> 
	</div> <!-- End Sidebar -->
</div> <!-- End #landing -->
<?php get_footer(); ?>