<?php get_header(); ?>
<section class="row wrapper radius10">
	<div class="twelve columns">
		<div class="row">
			<div class="twelve columns" id="archive">
			<h2><?php single_cat_title(); ?> Archive</h2>
			<?php while (have_posts()) : the_post(); ?>
					<article class="three columns mobile-four">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('rss'); ?>								
							<time><?php if(get_post_meta($post->ID, 'date_newsletter', true)) { echo get_post_meta($post->ID, 'date_newsletter', true); } else { echo get_the_date(); } ?></time>
							<h5><?php the_title(); ?></h5>
							<summary><?php the_excerpt(); ?></summary>
						</a>
					</article>			
			<?php endwhile; ?>
			</div>
		</div>
		<div class="row">
			<?php flagship_pagination(max_num_pages); ?>		
		</div>
	</div>
</section>

<?php get_footer(); ?>