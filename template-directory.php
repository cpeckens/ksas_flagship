<?php
/*
Template Name: Dean's Directory
*/
?>
<?php get_header(); 
	//Set Fields of Study Query Parameters
	if ( false === ( $flagship_leadership_query = get_transient( 'flagship_leadership_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_leadership_query = new WP_Query(array(
					'post_type' => 'people',
					'role' => 'leadership',
					'meta_key' => 'ecpt_people_alpha',
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'posts_per_page' => '-1'));
					set_transient( 'flagship_leadership_query', $flagship_leadership_query, 2592000 ); }
		
	if ( false === ( $flagship_dean_staff_query = get_transient( 'flagship_dean_staff_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_dean_staff_query = new WP_Query(array(
					'post_type' => 'people',
					'role' => 'staff',
					'meta_key' => 'ecpt_people_alpha',
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'posts_per_page' => '-1'));
					set_transient( 'flagship_dean_staff_query', $flagship_dean_staff_query, 2592000 ); }		 ?>
<div class="row wrapper radius10">
<div class="twelve columns">
	<section class="row">
	
		<div class="five columns copy">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2><?php the_title();?></h2>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
		</div>
		
		<div class="seven columns" id="fields_search">
			<form action="#">
				<fieldset class="radius10">
					<div class="row">
						<h6>Search the dean's directory:</h6>
					</div>
					
					<div class="row">		
						<input type="submit" class="icon-search" placeholder="Search by major/minor, interests, department name..."value="&#xe004;" />
						<input type="text" name="search" id="id_search"  /> 
					</div>
					
				</fieldset>
			</form>	
		</div>
	</section>
	
	<section class="row" id="fields_container">
		<ul class="twelve columns" id="directory">
		<?php while ($flagship_leadership_query->have_posts()) : $flagship_leadership_query->the_post(); ?>
				<li class="person">
					<div class="row">
						<div class="twelve columns">
						<a href="<?php the_permalink();?>" title="<?php the_title(); ?>" class="field">	
							<?php if ( has_post_thumbnail()) { ?> 
								<?php the_post_thumbnail('directory', array('class' => 'padding-five floatleft hide-for-small')); ?>
							<?php } ?>			    
						<h4 class="no-margin"><?php the_title(); ?></h4>
						<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?><h6><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h6><?php endif; ?></a>
						<p class="contact black">
							<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?><span class="icon-mobile"><?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></span><?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?><span class="icon-printer"><?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></span><?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?><span class="icon-mail"><a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"> <?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a></span><?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?><span class="icon-location"><?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></span><?php endif; ?>
						</p>
						
					</div>
				</li>		
	<?php endwhile; ?>
	
	
		<?php while ($flagship_dean_staff_query->have_posts()) : $flagship_dean_staff_query->the_post(); ?>
				<li class="person">
					<div class="row">
						<div class="twelve columns">
						<h4 class="no-margin"><?php the_title(); ?></h4>
						<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?><h6><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h6><?php endif; ?>
						<p class="contact">
							<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?><span class="icon-mobile"><?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></span><?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?><span class="icon-printer"><?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></span><?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?><span class="icon-mail"><a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"> <?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a></span><?php endif; ?>
							<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?><span class="icon-location"><?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></span><?php endif; ?>
						</p>
						</div>
					</div>
				</li>		
	<?php endwhile; ?>
	<div class="row" id="noresults">
		<div class="four columns centered">
			<h3> No matching results</h3>
		</div>
	</div>
</ul>
</section>


</div>
</div> <!-- End content wrapper -->
<?php get_footer(); ?>