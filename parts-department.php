<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<style>
	#field_image { background: #000 url('<?php echo get_post_meta($post->ID, 'ecpt_image', true); ?>') no-repeat top center; }
</style>
<div class="row radius10 hide-for-small" id="field_image">
	<div class="four columns black_bg offset-by-eight radius-topright">
		<?php if ( get_post_meta($post->ID, 'ecpt_headline', true) ) : ?><h3 class="sky_blue"><?php echo get_post_meta($post->ID, 'ecpt_headline', true) ?></h3><?php endif;?>
		<?php if ( get_post_meta($post->ID, 'ecpt_subhead', true) ) : ?><p class="white"><?php echo get_post_meta($post->ID, 'ecpt_subhead', true) ?></p><?php endif;?>
	</div>
</div>

<div class="row sidebar_bg radius10" id="landing">
	<div class="eight columns wrapper radius-left offset-top">		
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
					
					<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
						<span class="icon-new-tab-2">
						<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>">
							<?php echo get_post_meta($post->ID, 'ecpt_homepage', true);?>
						</a>
						</span>
					<?php endif; ?>
					
					<?php if ( get_post_meta($post->ID, 'ecpt_location', true) ) : ?>
						<span class="icon-location"><?php echo get_post_meta($post->ID, 'ecpt_location', true); ?></span> 
					<?php endif; ?>
				</p> <!-- End Contact info line -->
				
				<?php if ( get_post_meta($post->ID, 'ecpt_title', true) || get_post_meta($post->ID, 'ecpt_content', true) ) : ?>
					<div class="panel radius six columns floatleft mobile-four">
						<?php if ( get_post_meta($post->ID, 'ecpt_title', true) ) : ?>
							<h5 class="white"><?php echo get_post_meta($post->ID, 'ecpt_title', true);?></h5>  
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_content', true) ) :  echo get_post_meta($post->ID, 'ecpt_content', true);  endif; ?>
					</div>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section1', true) ) :  echo get_post_meta($post->ID, 'ecpt_section1', true);  endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section2heading', true) ) : ?><h3><?php echo get_post_meta($post->ID, 'ecpt_section2heading', true) ?></h3><?php else : ?>
					<h3>What can you do with your degree?</h3>
				<?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section2content', true) ) :  echo get_post_meta($post->ID, 'ecpt_section2content', true);  endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_section3heading', true) ) : ?><h3><?php echo get_post_meta($post->ID, 'ecpt_section3heading', true) ?></h3><?php else : ?>
					<h3>Related Programs and Centers</h3>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_section3content', true) ) :  echo get_post_meta($post->ID, 'ecpt_section3content', true);  endif; ?>
				
		<?php endwhile; endif; ?>	
		</section>
	</div>	<!-- End main content (left) section -->
	
	<div class="four columns"> <!-- Begin Sidebar -->
	<!--Begin Jump to department -->
		<div class="row jumpmenu">
			<form name="jump" class="ten columns no-gutter">
				<h6>Jump to department</h6>
				<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
					<option>--<?php the_title(); ?></option>
					<?php $jump_menu_query = new WP_Query(array(
						'post_type' => 'studyfields',
						'orderby' => 'title',
						'order' => 'ASC',
						'posts_per_page' => '-1',
						'meta_query' => array(
							array(
							    'key' => 'ecpt_structure',
							    'value' => 'department',
							    'compare' => 'IN'
							))
					)); ?>
					<?php while ($jump_menu_query->have_posts()) : $jump_menu_query->the_post(); ?>				
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
					<li><span class="icon-arrow-right-2"></span><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>">Department Website</a></li>
				<?php endif; ?>

				<?php if ( get_post_meta($post->ID, 'ecpt_facultypage', true) ) : ?>
					<li><span class="icon-arrow-right-2"></span><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_facultypage', true); ?>">Faculty</a></li>
				<?php endif; ?>

				<?php if ( get_post_meta($post->ID, 'ecpt_undergraduatepage', true) ) : ?>
					<li><span class="icon-arrow-right-2"></span><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_undergraduatepage', true); ?>">Undergraduate</a></li>
				<?php endif; ?>

				<?php if ( get_post_meta($post->ID, 'ecpt_graduatepage', true) ) : ?>
					<li><span class="icon-arrow-right-2"></span><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_graduatepage', true); ?>">Graduate</a></li>
				<?php endif; ?>
			<?php endwhile; endif; ?>	
			</ul>
		</div> <!--End Dept Nav Links -->
		
		<?php
			//Get the academic department slug 
			global $wp_query;
			foreach(get_the_terms($wp_query->post->ID, 'academicdepartment') as $term);
			$dept_slug = $term->slug;
			
			//Query department extras for that slug
			$dept_extra_query = new WP_Query(array(
						'post_type' => array('deptextra', 'post'),
						'orderby' => 'rand',
						'posts_per_page' => '1',
						'academicdepartment' => $dept_slug
						));
						 
			//If there are results
			if ( $dept_extra_query->have_posts() ) : while ( $dept_extra_query->have_posts() ) : $dept_extra_query->the_post();
			
			$format = get_post_format();  //Determine post format
			if ( false === $format )
				$format = 'standard';
				if ( $format == 'video' ) : locate_template('parts-extras-video.php', true, false); endif;
				if ( $format == 'quote' ) : locate_template('parts-extras-quote.php', true, false); endif;
				if ( $format == 'standard' ) : locate_template('parts-extras-news.php', true, false); endif;
		?>
<?php endwhile; else : ?>
		</div> 
	</div> <!-- End Sidebar -->
</div> <!-- End #landing -->
<?php endif; ?>