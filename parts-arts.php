<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<style>
	#field_image { background: #000 url('<?php echo get_post_meta($post->ID, 'ecpt_image', true); ?>') no-repeat top center; }
</style>
<div class="row radius10" id="field_image"></div>

<div class="row sidebar_bg radius10" id="landing">
	<div class="eight columns wrapper radius-left offset-top-small">		
		<section class="content">
				<h2><?php the_title();?></h2>
				<p class="contact"> <!-- Contact info line -->
					<?php if ( get_post_meta($post->ID, 'ecpt_phonenumber', true) ) : ?>
						<span class="icon-mobile"><?php echo get_post_meta($post->ID, 'ecpt_phonenumber', true); ?></span> 
					<?php endif; ?>
					
					<?php if ( get_post_meta($post->ID, 'ecpt_emailaddress', true) ) : ?>
						<span class="icon-mail">
						<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>">
							<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true);?>
						</a>
						</span>
					<?php endif; ?>
										
					<?php if ( get_post_meta($post->ID, 'ecpt_location', true) ) : ?>
						<span class="icon-location"><?php echo get_post_meta($post->ID, 'ecpt_location', true); ?></span> 
					<?php endif; ?>
					<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
						<br><span class="icon-new-tab-2">
						<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>">
							<?php echo get_post_meta($post->ID, 'ecpt_homepage', true);?>
						</a>
						</span>
					<?php endif; ?>
				</p> <!-- End Contact info line -->
				
				<?php if ( get_post_meta($post->ID, 'ecpt_title', true) || get_post_meta($post->ID, 'ecpt_content', true) ) : ?>
					<div class="panel radius five columns floatleft mobile-four">
						<?php if ( get_post_meta($post->ID, 'ecpt_title', true) ) : ?>
							<h5 class="white"><?php echo get_post_meta($post->ID, 'ecpt_title', true);?></h5>  
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_content', true) ) :  echo get_post_meta($post->ID, 'ecpt_content', true);  endif; ?>
					</div>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section1', true) ) :  echo get_post_meta($post->ID, 'ecpt_section1', true);  endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section2heading', true) ) : ?><h3><?php echo get_post_meta($post->ID, 'ecpt_section2heading', true) ?></h3><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section2content', true) ) :  echo get_post_meta($post->ID, 'ecpt_section2content', true);  endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section3heading', true) ) : ?><h3><?php echo get_post_meta($post->ID, 'ecpt_section3heading', true) ?></h3><?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_section3content', true) ) :  echo get_post_meta($post->ID, 'ecpt_section3content', true);  endif; ?>
				
		<?php endwhile; endif; ?>	
		</section>
	</div>	
	
	<div class="four columns"> <!-- Begin Sidebar -->
	<!--Begin Jump to department -->
		<div class="row jumpmenu">
			<form name="jump" class="ten columns no-gutter">
				<h6>Jump to department</h6>
				<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
					<option>--<?php the_title(); ?></option>
					<?php if ( false === ( $jump_menu_art_query = get_transient( 'jump_menu_art_query' ) ) ) {
						// It wasn't there, so regenerate the data and save the transient
						$jump_menu_art_query = new WP_Query(array(
								'post_type' => 'studyfields',
								'orderby' => 'title',
								'order' => 'ASC',
								'posts_per_page' => '-1',
								'meta_query' => array(
									array(
									    'key' => 'ecpt_structure',
									    'value' => 'interdisciplinary',
									    'compare' => 'IN'
									))
							));
							set_transient( 'jump_menu_art_query', $jump_menu_art_query, 2592000 ); } ?>
					<?php while ($jump_menu_art_query->have_posts()) : $jump_menu_art_query->the_post(); ?>				
						<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
					<?php endwhile; ?>
				</select>
			</form>
		</div><!--End jump-menu -->
		
		<!--Begin Department Navigation Links -->
		<div class="row">
			<ul class="nav">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
					<li><span class="icon-arrow-right-2"></span><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>">Explore <?php the_title(); ?></a></li>
				<?php endif; ?>
				<?php //Get the affilliation slug 
					$affiliations = get_the_terms( $post->ID, 'affiliation' );
						$affiliation_names = array();
							foreach ( $affiliations as $affiliation ) {
								$affiliation_names[] = $affiliation->slug;
							}
					$affiliation_name = $affiliation_names[0];
				 ?>
			<?php endwhile; endif; ?>	
			</ul>
		</div> <!--End Dept Nav Links -->
		
		<?php
			//Query department extras for that slug
			$dept_extra_query = new WP_Query(array(
						'post_type' => 'deptextra',
						'orderby' => 'rand',
						'posts_per_page' => '1',
						'affiliation' => $affiliation_name
						));
						 
			//If there are results
			if ( $dept_extra_query->have_posts() ) : while ( $dept_extra_query->have_posts() ) : $dept_extra_query->the_post();
			
			$format = get_post_format();  //Determine post format
				if ( $format == 'video' ) : locate_template('parts-extras-video.php', true, false); endif;
				if ( $format == 'quote' ) : locate_template('parts-extras-quote.php', true, false); endif;
				if ( $format == 'standard' ) : locate_template('parts-extras-news.php', true, false); endif;
		?>
<?php endwhile; else : ?>
		</div> 
	</div> <!-- End Sidebar -->
</div> <!-- End #landing -->
<?php endif; ?>