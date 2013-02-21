<?php
/*
Template Name: Search Results
*/
?>
<?php get_header(); ?>

<div class="row wrapper radius10">
	<div class="twelve columns">
		<h2>Search Results</h2>
		<section>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<a href="<?php the_permalink(); ?>">
				<h4><?php the_title();?></h4>
				<?php the_excerpt(); ?>
			</a>
			<hr>
		<?php endwhile; endif; ?>
		</section>
		<section id="results">
		</section>
	</div>
</div>

<?php get_footer(); ?>

