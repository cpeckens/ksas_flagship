<?php get_header(); ?>

<div class="row wrapper radius10">
	<div class="twelve columns">
		<div class="row">
			<div class="five columns">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2><?php the_title();?></h2>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
			</div>
			
			<div id="slider" class="six columns no-gutter photo-page-right">
		<?php if ( false === ( $research_query = get_transient( 'research_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$research_query = new WP_Query(array(
						'post_type' => array('deptextra', 'post'),
						'category_name' => 'research',
						'orderby' => 'rand',
						'posts_per_page' => '5'
						
						));
					set_transient( 'research_query', $research_query, 2592000 ); }
			if ( $research_query->have_posts() ) : while ( $research_query->have_posts() ) : $research_query->the_post();
			$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
			$thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'bullet');
			?>
				<div class="slide" data-thumb="<?php echo $thumbnail_url[0]; ?>">
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo $full_image_url[0]; ?>" class="radius-topright" />
						<summary>
							<h3 class="no-margin white"><?php the_title(); ?></h3>
							<h5 class="white italic no-margin"><?php echo get_the_content(); ?><span class="icon-arrow-right-2"></span></h5>
						</summary>
					</a>
				</div> <!-- End slide -->
		<?php endwhile; endif; ?>
			</div> <!-- End slider -->

		</div>		
	</div>
</div> <!-- End Wrapper -->


<?php get_footer(); ?>