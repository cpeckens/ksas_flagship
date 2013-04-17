<?php
/*
Template Name: Video Archive
*/
?>
<?php get_header(); ?>

<?php $paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
			if ( false === ( $flagship_video_archive_query = get_transient( 'flagship_video_archive_query_' . $paged ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_video_archive_query = new WP_Query(array(
					'post_type' => array('deptextra', 'post'),
					'tax_query' => array(
						array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => 'post-format-video',
						'operator' => 'IN' )),
					'posts_per_page' => '12',
					'paged' => $paged
					)); 
					set_transient( 'flagship_video_archive_query_' . $paged, $flagship_video_archive_query, 2592000 );
			} 	?>

<section class="row wrapper radius10">
	<div class="twelve columns">
		<div class="row">
			<div class="twelve columns" id="archive">
			<h2>Video Library</h2>
			<?php locate_template('parts-archive-navigation.php', true, false); ?>
			<?php while ($flagship_video_archive_query->have_posts()) : $flagship_video_archive_query->the_post(); ?>
				<article class="four columns mobile-four">
				<a href="#" data-reveal-id="modal_home_<?php the_id(); ?>_video">
					<div class="video_thumb archive">
						<?php the_post_thumbnail('bullet', array('class' => 'floatleft')); ?>
					</div>
						<time><?php echo get_the_date(); ?></time>						
						<h5 class="icon-video"><?php the_title(); ?></h5>
						<summary><?php echo limit_words(get_the_excerpt(), '25'); ?><span class="blue">&nbsp;&nbsp;[Read More]</span></summary>
					</a>
				</article>
			<?php endwhile; ?>
			</ul>
			</div>
		</div>
		<div class="row">
			<?php flagship_pagination($flagship_video_archive_query->max_num_pages); ?>		
		</div>
	</div>
</section>

<!-- VIDEO MODALS -->
<?php if ( $flagship_video_archive_query->have_posts() ) : while ( $flagship_video_archive_query->have_posts() ) : $flagship_video_archive_query->the_post(); ?>
<div id="modal_home_<?php the_id(); ?>_video" class="reveal-modal large black_bg">
	<div class="flex-video">
		<?php the_content(); ?>
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>