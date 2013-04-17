<?php
/*
Template Name: Research Opp
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="row sidebar_bg radius10" id="opp">
	<div class="eight columns wrapper radius-left offset-topgutter">		
		<section class="content">
				<h2><?php the_title();?></h2>
					<?php if ( has_post_thumbnail()) { ?> 
						<div class="photo-page-left floatleft seven columns">
							<?php the_post_thumbnail('full',array('class'	=> "radius-topleft")); ?>
						</div>
					<?php } ?>
				<?php the_content(); ?>
		</section>
	</div>	<!-- End main content (left) section -->
<?php endwhile; endif; ?>	
	
<?php	
	if ( false === ( $undergraduate_research_query = get_transient( 'undergraduate_research_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$undergraduate_research_query = new WP_Query(array(
					'post_type' => 'page',
					'meta_key' => 'fund_type',
					'meta_value' => 'undergraduate',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => '-1'));
					set_transient( 'undergraduate_research_query', $undergraduate_research_query, 2592000 ); }
	
	if ( false === ( $graduate_research_query = get_transient( 'graduate_research_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$graduate_research_query = new WP_Query(array(
					'post_type' => 'page',
					'meta_key' => 'fund_type',
					'meta_value' => 'graduate',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => '-1'));
					set_transient( 'graduate_research_query', $graduate_research_query, 2592000 ); }
?>
	<div class="four columns" id="sidebar"> <!-- Begin Sidebar -->
		<div class="blue_bg radius-topright offset-gutter" id="sidebar_header">
			<h5 class="white">Krieger School of Arts and Sciences Fellowship Programs</h5>
		</div>
		<!--Begin Department Navigation Links -->
		<div class="row">
			<h6>Undergraduate Opportunities</h6>
			<ul class="nav">
			<?php while ($undergraduate_research_query->have_posts()) : $undergraduate_research_query->the_post(); ?>
					<li><span class="icon-arrow-right-2"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile ?>
			</ul>
		</div> <!--End Dept Nav Links -->

		<div class="row">
			<h6>Graduate Opportunities</h6>
			<ul class="nav">
			<?php while ($graduate_research_query->have_posts()) : $graduate_research_query->the_post(); ?>
					<li><span class="icon-arrow-right-2"></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile ?>
			</ul>
		</div> <!--End Dept Nav Links -->
		
		</div> 
	</div> <!-- End Sidebar -->
</div> <!-- End #landing -->
<?php get_footer(); ?>