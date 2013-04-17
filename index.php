<?php get_header(); ?>

<?php 

$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
$flagship_news_archive_query = new WP_Query(array(
    		'post_type' => array('deptextra', 'post'),
    		'category_name' => 'news',
    		'posts_per_page' => '12',
    		'paged' => $paged
       		)); 
?>

<section class="row wrapper radius10" role="main">
	<div class="twelve columns">
		<div class="row">
			<div class="twelve columns" id="archive">
			<h2>News &amp; Video Archive</h2>
			<?php locate_template('parts-archive-navigation.php', true, false); ?>
			<?php while ($flagship_news_archive_query->have_posts()) : $flagship_news_archive_query->the_post(); ?>
				<?php $format = get_post_format();  //Determine post format
					if ( false === $format ) { $format = 'standard'; }
					if ( $format == 'standard' ) { ?>

					<article class="four columns mobile-four">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('bullet', array('class' => 'floatleft')); ?>								
							<time><?php echo get_the_date(); ?></time>
							<h5 class="icon-newspaper"><?php the_title(); ?></h5>
							<summary><?php echo limit_words(get_the_excerpt(), '25'); ?><span class="blue">&nbsp;&nbsp;[Read More]</span></summary>
						</a>
					</article>
					
				<?php } if ( $format == 'video' ) { ?>
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
					
				<?php } if ( $format == 'image' ) { ?>
					<article class="four columns mobile-four">
						<a href="#" data-reveal-id="modal_home_<?php the_id(); ?>_image">
							<?php the_post_thumbnail('bullet', array('class' => 'floatleft')); ?>
							<time><?php echo get_the_date(); ?></time>
							<h5 class="icon-camera"><?php the_title(); ?></h5>
							<summary><?php echo limit_words(get_the_content(), '25'); ?><span class="blue">&nbsp;&nbsp;[Read More]</span></summary>
						</a>
					</article>
				<?php } ?>
			<?php endwhile; ?>
			</div>
		</div>
		<div class="row" role="navigation">
			<?php flagship_pagination($flagship_news_archive_query->max_num_pages); ?>		
		</div>
	</div>
</section>

<?php while ($flagship_news_archive_query->have_posts()) : $flagship_news_archive_query->the_post(); 
	$format = get_post_format();  //Determine post format ?>
	
	<?php if ( $format == 'video' ) { ?>
		<div id="modal_home_<?php the_id(); ?>_video" class="reveal-modal large black_bg">
			<div class="flex-video">
				<?php the_content(); ?>
			</div>
			<a class="close-reveal-modal">&#215;</a>
		</div>	
	
	<?php } if ( $format == 'image' ) { ?>
		<div id="modal_home_<?php the_id(); ?>_image" class="reveal-modal large black_bg">
				<?php the_post_thumbnail('full'); ?>
				<h4><?php echo get_the_date(); ?> - <?php the_title();?></h4>
				<?php the_content(); ?>
			<a class="close-reveal-modal">&#215;</a>
		</div>
	<?php } ?>
<?php endwhile; ?>
<?php get_footer(); ?>