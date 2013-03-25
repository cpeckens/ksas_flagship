<?php get_header(); ?>

<div class="row wrapper radius10" role="main">
	<div class="twelve columns">
		<div class="row">
			<div class="five columns">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2><?php the_title();?></h2>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
			</div>
			<div class="six columns">
				<div id="slider" class="no-gutter photo-page-right">
					<?php $by_the_numbers_query = new WP_Query(array(
							'post_type' => 'post',
							'category_name' => 'numbers',
							'orderby' => 'rand',
							'posts_per_page' => '-1'
							
							));
						if ( $by_the_numbers_query->have_posts() ) : while ( $by_the_numbers_query->have_posts() ) : $by_the_numbers_query->the_post(); ?>
					<div class="number">
							<?php the_post_thumbnail('full',array( 'class'	=> "radius-topright")); ?>
							<summary class="<?php echo get_post_meta($post->ID, 'bg_color', true); ?>">
								<h3 class="no-margin white bold" align="center"><?php the_title(); ?></h3>
								<h5 class="white bold no-margin" align="center"><?php echo get_the_content(); ?></h5>
							</summary>
					</div> <!-- End number -->
			<?php endwhile; endif; ?>
				</div> <!-- End slider -->
			<?php $dean_letter_query = new WP_Query(array(
						'post_type' => 'post',
						'category_name' => 'newsletter',
						'posts_per_page' => '1'
						
						));
			if ( $dean_letter_query->have_posts() ) : while ( $dean_letter_query->have_posts() ) : $dean_letter_query->the_post(); ?>
			<div class="blue_bg row no-gutter" id="newsletter" role="complementary">
				<div class="eight columns">
					<h6 class="white">Dean's Newsletter <span class="floatright"><?php echo get_post_meta($post->ID, 'date_newsletter', true); ?></span></h6>
					<h5 class="white"><?php the_title(); ?></h5>
					<span class="white"><?php the_excerpt(); ?></span>
				</div>
				<div class="four columns no-gutter">
					<?php the_post_thumbnail('medium') ?>
				</div>
			</div> <!-- End Newsletter -->
			<?php endwhile; endif; ?>
			</div>
		</div>		
	</div>
</div> <!-- End Wrapper -->


<?php get_footer(); ?>