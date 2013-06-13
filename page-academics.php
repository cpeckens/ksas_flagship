<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="row wrapper radius10">
	<div class="twelve columns">
		<div class="row">
			<div class="six columns photo-page-left">
				<?php the_post_thumbnail('full',array(
						'class'	=> "radius-topleft")); ?>
			</div>
			
			<div class="six columns">
				<h2 class="blue"><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		</div>
<?php endwhile; endif; ?>
		
		<div class="row">
			<div class="four columns" id="links">
				<dl class="tabs contained">
					<dd class="active blue_bg semibold">Academic Resources</dd>
				</dl>
			
				<ul class="tabs-content contained">
				<?php wp_nav_menu( array( 
						'theme_location' => '',
						'menu' => 'Academic Resources', 
						'menu_class' => 'panel', 
						'container' => 'li',
						'container_class' => 'active',
						'depth' => 1 )); ?> 
				</ul>
			</div>
			
			<div class="eight columns tan_bg radius10">
				<div class="row">
					<div class="offset-by-one">
						<a href="<?php echo site_url('/news/archive/student-voices'); ?>"><h3 class="blue">Student Voices</h3></a>
						<p><i>Hear what current students have to say about Johns Hopkins and their academic experience</i></p>
					</div>	
				</div>
				
				<div class="row" id="video_scroll">
				<div class="one column spacer"></div>
					<?php $student_voice_query = new WP_Query(array(
							'post_type' => array('deptextra', 'post'),
							'category_name' => 'voices',
							'orderby' => 'rand',
							'posts_per_page' => '3',
						));
	 
						if ( $student_voice_query->have_posts() ) : while ( $student_voice_query->have_posts() ) : $student_voice_query->the_post(); 

				 ?>
					<article class="three columns rust_bg no-gutter voices">
						<a href="#" data-reveal-id="modal_home_<?php the_id(); ?>_video" onclick="ga('send', 'event', 'Video', 'Play', '<?php the_title(); ?>');">
							<div class="video_thumb small">
								<span class="icon-play"></span><?php the_post_thumbnail('full'); ?>
							</div>
							<?php if (has_term('','academicdepartment', $post->ID) == true) {
							$terms = get_the_terms( $post->ID, 'academicdepartment' );
								$dept_name_array = array();
								foreach ( $terms as $term ) {
								    $dept_name_array[] = $term->name;
								}
							?><h3><?php echo $dept_name_array[0]?></h3>
							<?php } else {
								$affiliations = get_the_terms( $post->ID, 'affiliation' );
									$affiliation_names = array();
									foreach ( $affiliations as $affiliation ) {
										$affiliation_names[] = $affiliation->name;
									}
								?>
									<h3><?php echo $affiliation_names[0]; ?></h3>
							<?php } ?>							
						</a>
					</article>
					<?php endwhile; endif; ?>
					<div class="one column spacer"></div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ************Modal Video Boxes******************* -->
<?php if ( $student_voice_query->have_posts() ) : while ( $student_voice_query->have_posts() ) : $student_voice_query->the_post(); ?>
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
<!-- ************End Modal Video Boxes******************* -->

<?php get_footer(); ?>

