<?php get_header(); ?>

<div class="row wrapper radius10">
	<div class="twelve columns">
		<section>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<time><h6><?php echo get_the_date(); ?></h6></time>
			<h2 class="blue"><?php the_title();?></h2>
			<?php the_post_thumbnail('full', array('class' => 'floatleft')); ?>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>
