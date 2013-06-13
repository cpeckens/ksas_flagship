<?php
/*
Template Name: Fields of Study
*/
?>
<?php get_header(); 
	//Set Fields of Study Query Parameters
	if ( false === ( $flagship_studyfields_query = get_transient( 'flagship_studyfields_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_studyfields_query = new WP_Query(array(
					'post_type' => 'studyfields',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => '-1'));
					set_transient( 'flagship_studyfields_query', $flagship_studyfields_query, 2592000 ); } ?>
<div class="row wrapper radius10">
<div class="twelve columns">
	<section class="row">
	
		<div class="five columns copy">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2><?php the_title();?></h2>
			<p><?php the_content(); ?></p>
		<?php endwhile; endif; ?>
		</div>
		
		<div class="seven columns" id="fields_search" role="search">
			<form action="#">
				<fieldset class="radius10">

					<div class="row filter option-set" data-filter-group="program_type">
						<h5>Choose program type:</h5>
						<div class="button radio"><a href="#" data-filter="" class="selected">View all</a></div>
						<div class="button radio"><a href="#" data-filter=".undergrad_program" onclick="ga('send', 'event', 'Fields', 'Filter', 'Undergrad');">Undergraduate</a></div>
						<div class="button radio"><a href="#" data-filter=".full_time_program" onclick="ga('send', 'event', 'Fields', 'Filter', 'Graduate');">Graduate (full-time)</a></div>
						<div class="button radio"><a href="#" data-filter=".part_time_program" onclick="ga('send', 'event', 'Fields', 'Filter', 'AAP');">Graduate (part-time)</a></div>
					</div>
					<div class="row">
						<h5>Search by keyword:</h5>		
						<input type="submit" class="icon-search" placeholder="Search by major/minor, interests, department name..."value="&#xe004;" />
						<input type="text" name="search" value="<?php if (isset($_POST['home_search'])) { echo($_POST['home_search']); } ?>" id="id_search" aria-label="Search"  /> 
					</div>
					
					<div class="row hide-for-mobile">
						<h5>Filter fields of study:</h5>
					</div>

					<div class="row filter hide-for-mobile option-set" data-filter-group="structure">
						<div class="button bright_blue_bg"><a href="#" data-filter="" class="selected">View All</a></div>
						<div class="button green_bg"><a href="#" data-filter=".department" onclick="ga('send', 'event', 'Fields', 'Filter', 'Department');">Departments</a></div>
						<div class="button purple_bg"><a href="#" data-filter=".interdisciplinary" onclick="ga('send', 'event', 'Fields', 'Filter', 'Interdisciplinary');">Interdisciplinary</a></div>
						<div class="button fushia"><a href="#" data-filter=".arts" onclick="ga('send', 'event', 'Fields', 'Filter', 'Arts');">The Arts</a></div>
						<div class="button yellow_bg"><a href="#" data-filter=".humanities" onclick="ga('send', 'event', 'Fields', 'Filter', 'Humanities');">Humanities</a></div>
						<div class="button orange_bg"><a href="#" data-filter=".natural" onclick="ga('send', 'event', 'Fields', 'Filter', 'Natural');">Natural Sciences</a></div>
						<div class="button bright_blue_bg"><a href="#" data-filter=".social" onclick="ga('send', 'event', 'Fields', 'Filter', 'Social');">Social Sciences</a></div>
					</div>
					
				</fieldset>
			</form>	
		</div>
	</section>

<section class="row" id="fields_container" role="main">
	<?php while ($flagship_studyfields_query->have_posts()) : $flagship_studyfields_query->the_post(); 
		//Pull discipline array (humanities, natural, social)
		if(get_post_meta($post->ID, 'ecpt_discipline', true)) {
			$discipline_array = get_post_meta($post->ID, 'ecpt_discipline', true);
			$discipline = array_values($discipline_array);
		}
		$program_types = get_the_terms( $post->ID, 'program_type' );
			if ( $program_types && ! is_wp_error( $program_types ) ) : 
				$program_type_names = array();
					foreach ( $program_types as $program_type ) {
						$program_type_names[] = $program_type->slug;
					}
				$program_type_name = join( " ", $program_type_names );
			endif;
	?>
		
		<!-- Set classes for isotype.js filter buttons -->
		<div class="four columns mobile-four mobile-field <?php echo $discipline[0] . ' '; if ( isset($discipline[1] )) { echo $discipline[1] . ' ';  } if ( isset($discipline[2] )) { echo $discipline[2] . ' ';  } echo get_post_meta($post->ID, 'ecpt_structure', true);?> <?php echo $program_type_name; ?>">
		
			<a href="<?php the_permalink();?>" title="<?php the_title(); ?>" class="field">
				<div class="twelve columns field" id="<?php echo get_post_meta($post->ID, 'ecpt_structure', true); ?>">
				
				<!-- Display ribbons for discipline taxonomy -->
				<div class="row">	
					<div class="twelve columns disciplines">
					</div>
				</div>
				
					<img align="center" src="<?php echo get_post_meta($post->ID, 'ecpt_indeximage', true); ?>" />
					<h3><?php the_title(); ?></h3>
					<div class="row">
						<div class="twelve columns">
							<p class="contact">
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