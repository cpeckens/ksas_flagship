<div class="row sidebar_tan_bg radius10">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="eight columns wrapper radius-left offset-topgutter">
		<section>
				<h2><?php the_title();?></h2>
				<?php the_content(); ?>
		</section>
	</div>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>

	<div class="four columns toplayer" id="sidebar"> <!-- Begin Sidebar -->
		<img src="<?php echo get_template_directory_uri() ?>/assets/images/dean.jpg" class="radius-topright offset-gutter" />
		<h5>Dean Katherine S. Newman</h5>
		<div class="row">
			<?php wp_nav_menu( array( 
				'theme_location' => '',
				'menu' => 'Dean Links', 
				'depth' => 1 )); ?> 
		</div>
		<div class="row">
		<h5>Newsletter Archive</h5>
			<?php $dean_letter_query = new WP_Query(array(
						'post_type' => 'post',
						'category_name' => 'newsletter',
						'posts_per_page' => '1'
						
						));
			if ( $dean_letter_query->have_posts() ) : while ( $dean_letter_query->have_posts() ) : $dean_letter_query->the_post(); ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<h6><?php echo get_post_meta($post->ID, 'date_newsletter', true); ?></h6>
				<h5><?php the_title(); ?></h5>
			</a>
			<?php endwhile; endif; ?>
		</div>
	</div> <!-- End Sidebar -->
</div> 
