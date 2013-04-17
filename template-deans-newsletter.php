<?php
/*
Template Name: Dean's Newsletter
*/
?>
<?php get_header(); ?>
<div class="row sidebar_bg radius10">
<?php if ( false === ( $dean_letter_query = get_transient( 'dean_letter_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$dean_letter_query = new WP_Query(array(
						'post_type' => 'post',
						'category_name' => 'newsletter',
						'posts_per_page' => '1',						
						));
					set_transient( 'dean_letter_query', $dean_letter_query, 2592000 ); }
?>
<?php if ( $dean_letter_query->have_posts() ) : while ( $dean_letter_query->have_posts() ) : $dean_letter_query->the_post(); ?>
	<div class="eight columns wrapper radius-left offset-topgutter">
		<section role="main">
				<h5 class="uppercase no-margin">Dean's Newsletter <time class="floatright"><?php echo get_post_meta($post->ID, 'date_newsletter', true); ?></time></h4>
				<p><b>A quarterly newslettter from Dean Katherine S. Newman</b></p>
				<h2><?php the_title();?></h2>
				<?php the_content(); ?>
		</section>
	</div>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>
	<?php locate_template('parts-deans-sidebar.php', true, false); ?>
	</div> 
<?php get_footer(); ?>