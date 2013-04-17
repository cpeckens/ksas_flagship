<aside class="four columns toplayer" id="sidebar" role="complementary"> <!-- Begin Sidebar -->
		<div class="photo-page-right">
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/dean.jpg" class="radius-topright offset-gutter" />
		</div>
		<div class="rust_bg offset-gutter" id="sidebar_header">
			<h5>Dean Katherine S. Newman</h5>
		</div>
		<div class="row">
			<?php wp_nav_menu( array( 
				'menu' => 'Dean Links',
				'container' => false,
				'menu_class' => 'nav',
				'link_before' => '<span class="icon-arrow-right-2"></span>', 
				'depth' => 1 )); ?> 
		</div>
		<div class="rust_bg offset-gutter" id="sidebar_header">
			<h5>Past Newsletters</h5>
		</div>
		

			<?php if ( false === ( $dean_letter_archive_query = get_transient( 'dean_letter_archive_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$dean_letter_archive_query = new WP_Query(array(
						'post_type' => 'post',
						'category_name' => 'newsletter',
						'posts_per_page' => '4',
						'offset' => 1
						
						));
					set_transient( 'dean_letter_archive_query', $dean_letter_archive_query, 2592000 ); }
			if ( $dean_letter_archive_query->have_posts() ) : while ( $dean_letter_archive_query->have_posts() ) : $dean_letter_archive_query->the_post(); ?>
			<div class="row">
			<div class="twelve columns">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<time class="no-margin"><?php echo get_post_meta($post->ID, 'date_newsletter', true); ?></time>
				<h5 class="no-margin"><?php the_title(); ?></h5>
				<?php the_excerpt(); ?>
				
			</a>
			</div>
			</div>
			<?php endwhile; ?>
			<p class="floatright"><a href="<?php echo site_url('/blog/category/newsletter'); ?>"><b>View full archive &nbsp;</b><span class="icon-arrow-right-2"></span></a></p>
			<?php endif; ?>
		
	</aside> <!-- End Sidebar -->
