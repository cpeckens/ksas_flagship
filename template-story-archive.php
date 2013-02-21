<?php
/*
Template Name: Article Archive
*/
?>
<?php get_header(); ?>

<?php 

$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
$flagship_article_archive_query = new WP_Query(array(
    		'category_name' => 'news',
			'tax_query' => array(
				array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array('post-format-video', 'post-format-image'),
				'operator' => 'NOT IN')),
    		'posts_per_page' => '12',
    		'paged' => $paged
       		)); 
?>

<section class="row wrapper radius10">
	<div class="twelve columns">
		<div class="row">
			<div class="twelve columns" id="archive">
			<h2>News Articles</h2>
			<?php locate_template('parts-archive-navigation.php', true, false); ?>			
			<?php while ($flagship_article_archive_query->have_posts()) : $flagship_article_archive_query->the_post(); ?>
					<article class="three columns mobile-four">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('rss'); ?>								
							<time><?php echo get_the_date(); ?></time>
							<h5 class="icon-newspaper"><?php the_title(); ?></h5>
							<summary><?php the_excerpt(); ?></summary>
						</a>
					</article>			
			<?php endwhile; ?>
			</div>
		</div>
		<div class="row">
			<?php flagship_pagination($flagship_article_archive_query->max_num_pages); ?>		
		</div>
	</div>
</section>

<?php get_footer(); ?>