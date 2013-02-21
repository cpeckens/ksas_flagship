<?php
/*
Template Name: Photo Archive
*/
?>
<?php get_header(); ?>

<?php 

$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
$flagship_photo_archive_query = new WP_Query(array(
    		'category_name' => 'news',
    		'tax_query' => array(
    			array(
    			'taxonomy' => 'post_format',
    			'field' => 'slug',
    			'terms' => 'post-format-image',
    			'operator' => 'IN' )),
    		'posts_per_page' => '12',
    		'paged' => $paged
       		)); 
?>

<section class="row wrapper radius10">
	<div class="twelve columns">
		<div class="row">
			<div class="twelve columns" id="archive">
			<h2>This Week on Campus</h2>
			<?php locate_template('parts-archive-navigation.php', true, false); ?>			
			<ul class="photo_list" data-clearing>
			<?php while ($flagship_photo_archive_query->have_posts()) : $flagship_photo_archive_query->the_post(); 
				$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
				$thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'rss');
				$caption = get_the_content();
				$clean_caption = strip_tags($caption);
			?>
					<li class="three columns mobile-four">
						<a href="<?php echo $full_image_url[0]; ?>">
								<img src="<?php echo $thumbnail_url[0]; ?>" data-caption="<?php echo $clean_caption; ?>" >
								<time><?php echo get_the_date(); ?></time>
								<h5 class="icon-camera"><?php the_title(); ?></h5>
								<?php the_content(); ?>
						</a>
					</li>
			<?php endwhile; ?>
			</ul>
			</div>
		</div>
		<div class="row">
			<?php flagship_pagination($flagship_photo_archive_query->max_num_pages); ?>		
		</div>
	</div>
</section>

<?php get_footer(); ?>