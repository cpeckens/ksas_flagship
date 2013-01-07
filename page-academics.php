<?php get_header(); ?>

<div class="row wrapper radius10">
	<div class="twelve columns">
		<section>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>

