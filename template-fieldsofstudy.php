<?php
/*
Template Name: Fields of Study
*/
?>
<?php get_header(); 
	//Set Fields of Study Query Parameters
	$flagship_studyfields_query = new WP_Query(array(
		'post_type' => 'studyfields',
		'orderby' => 'title',
		'order' => 'ASC',
		'posts_per_page' => '-1')); ?>
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
						<h5>Search fields of study:</h5>
					</div>
					<div class="row filter option-set" data-filter-group="program_type">
						<label>Program Type:</label>
						<button class="radio"><a href="#" data-filter="" class="selected">View all</a></button>
						<button class="radio"><a href="#" data-filter="undergraduate">Undergraduate</a></button>
						<button class="radio"><a href="#" data-filter="full_time_grad">Graduate (full-time)</a></button>
						<button class="radio"><a href="#" data-filter="part_time_grad">Graduate (part-time)</a></button>
					</div>
					<div class="row">		
						<input type="submit" class="icon-search" placeholder="Search by major/minor, interests, department name..."value="&#xe004;" />
						<input type="text" name="search" value="<?php if (isset($_POST['home_search'])) { echo($_POST['home_search']); } ?>" id="id_search"  /> 
					</div>
					
					<div class="row">
						<h5>Filter fields of study:</h5>
					</div>

					<div class="row filter option-set" data-filter-group="structure">
						<button class="bright_blue_bg"><a href="#" data-filter="" class="selected">View All</a></button>
						<button class="green_bg"><a href="#" data-filter=".department">Departments</a></button>
						<button class="purple_bg"><a href="#" data-filter=".interdisciplinary">Interdisciplinary</a></button>
						<button class="fushia"><a href="#" data-filter=".arts">The Arts</a></button>
						<button class="yellow_bg"><a href="#" data-filter=".humanities">Humanities</a></button>
						<button class="orange_bg"><a href="#" data-filter=".natural">Natural Sciences</a></button>
						<button class="bright_blue_bg"><a href="#" data-filter=".social">Social Sciences</a></button>
					</div>
					
				</fieldset>
			</form>	
		</div>
	</section>

<section class="row" id="fields_container">
	<?php while ($flagship_studyfields_query->have_posts()) : $flagship_studyfields_query->the_post(); 
		//Pull discipline array (humanities, natural, social)
		$discipline_array = get_post_meta($post->ID, 'ecpt_discipline', true);
		$discipline = array_values($discipline_array);
		$program_types = get_the_terms( $post->ID, 'program_types' );
			if ( $program_types && ! is_wp_error( $program_types ) ) : 
				$program_type_names = array();
					foreach ( $program_types as $program_type ) {
						$program_type_names[] = $program_type->slug;
					}
				$program_type_name = join( " ", $program_type_names );
			endif;
	?>
		
		<!-- Set classes for isotype.js filter buttons -->
		<div class="four columns mobile-two mobile-field <?php echo $discipline[0] . ' '; if ( isset($discipline[1] )) { echo $discipline[1] . ' ';  } if ( isset($discipline[2] )) { echo $discipline[2] . ' ';  } echo get_post_meta($post->ID, 'ecpt_structure', true); echo $program_type_name; ?>">
		
			<a href="<?php the_permalink();?>" title="<?php the_title(); ?>" class="field">
				<div class="twelve columns field" id="<?php echo get_post_meta($post->ID, 'ecpt_structure', true); ?>">
				
				<!-- Display ribbons for discipline taxonomy -->
				<div class="row">	
					<div class="twelve columns disciplines">
					</div>
				</div>
				
					<img src="<?php echo get_post_meta($post->ID, 'ecpt_indeximage', true); ?>" />
					<h3><?php the_title(); ?></h3>
					<div class="row">
						<div class="twelve columns">
							<p>
								<?php echo get_post_meta($post->ID, 'ecpt_phonenumber', true); ?>
								<span class="floatright"><?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?></span>
							</p>
							<p>
								<?php if (get_post_meta($post->ID, 'ecpt_majors', true)) : ?>
									<b>Majors:</b>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_majors', true); ?><br>
								<?php endif; ?>
								<?php if (get_post_meta($post->ID, 'ecpt_minors', true)) : ?>
									<b>Minors:</b>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_minors', true); ?><br>
								<?php endif; ?>
								<?php if (get_post_meta($post->ID, 'ecpt_degreesoffered', true)) : ?>
									<b>Degrees Offered:</b>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_degreesoffered', true); ?>
								<?php endif; ?>
								<?php if (get_post_meta($post->ID, 'ecpt_pcitext', true)) : ?>
									<?php echo get_post_meta($post->ID, 'ecpt_pcitext', true); ?>
								<?php endif; ?>
							</p>
						</div>	
					</div>
					<span class="hide"><?php echo get_post_meta($post->ID, 'ecpt_keywords', true); ?></span>
				</div>
			</a>
		</div>
	<?php endwhile; ?>
	
	<div class="row" id="noresults">
		<div class="four columns centered">
			<h3> No matching results</h3>
		</div>
	</div>
</section>


</div>
</div> <!-- End content wrapper -->
<?php get_footer(); ?>