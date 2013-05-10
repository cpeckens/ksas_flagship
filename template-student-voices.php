<?php
/*
Template Name: Student Voices
*/
?>
<?php get_header(); ?>

<?php $paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
			if ( false === ( $flagship_student_voices_query = get_transient( 'flagship_student_voices_query_' . $paged ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_student_voices_query = new WP_Query(array(
					'post_type' => array('deptextra', 'post'),
					'tax_query' => array(
						array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => 'post-format-video',
						'operator' => 'IN' )),
					'category_name' => 'voices',
					'posts_per_page' => '12',
					'paged' => $paged
					)); 
					set_transient( 'flagship_student_voices_query_' . $paged, $flagship_student_voices_query, 2592000 );
			} 	?>

<section class="row wrapper radius10">
	<div class="twelve columns">
		<div class="row">
			<div class="twelve columns" id="archive">
			<h2>Student Voices</h2>
			<?php locate_template('parts-archive-navigation.php', true, false); ?>
			<?php while ($flagship_student_voices_query->have_posts()) : $flagship_student_voices_query->the_post(); ?>
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
			<?php flagship_pagination($flagship_student_voices_query->max_num_pages); ?>		
		</div>
	</div>
</section>

<!-- VIDEO MODALS -->
<?php if ( $flagship_student_voices_query->have_posts() ) : while ( $flagship_student_voices_query->have_posts() ) : $flagship_student_voices_query->the_post(); ?>
<div id="modal_home_<?php the_id(); ?>_video" class="reveal-modal large black_bg">
	<div class="flex-video">
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>
		<script>
		<?php 
		$vid_url = get_the_content();
		$embed_vid = "[embed]" . $vid_url . "[/embed]"; 
		$wp_embed = new WP_Embed();
		$post_embed = $wp_embed->run_shortcode($embed_vid); ?>
		var $d = jQuery.noConflict();
            $d('a[data-reveal-id="modal_home_<?php the_id(); ?>_video"]').click( function(){
                $d('<?php echo $post_embed; ?>').appendTo('#modal_home_<?php the_id();?>_video .flex-video');
            });
        </script>
<?php endwhile; endif; ?>
<?php get_footer(); ?>