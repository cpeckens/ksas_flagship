<?php get_header(); ?>

<div class="row wrapper radius10">
	<section class="twelve columns no-gutter" role="main-content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if ( has_post_thumbnail()) { ?> 
			<div class="photo-page-left floatleft six columns">
				<?php the_post_thumbnail('full',array('class'	=> "radius-topleft")); ?>
			</div>
			<?php } ?>

			<h2><?php the_title();?></h2>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
	</section>
</div>

<?php get_footer(); ?>

