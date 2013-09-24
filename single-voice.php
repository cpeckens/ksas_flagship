<?php get_header(); ?>

<div class="row wrapper radius10">
	<div class="twelve columns">
		<section>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2 class="blue"><?php the_title();?></h2>
			<div class="row">
				<div class="six columns end">
					<?php the_excerpt() ?>
				</div>
			</div>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>
