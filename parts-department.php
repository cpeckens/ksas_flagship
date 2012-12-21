<div class="row wrapper">

	<div class="twelve columns">
		<section class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="nine columns">
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
					<div class="panel radius four columns floatleft">
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
				
			</div>
		<?php endwhile; endif; ?>	
			<div class="three columns">
					<!--Begin Jump to department -->
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
						<div class="row jumpmenu">
							<form name="jump eight columns centered">
								<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
									<option>Jump to department</option>
									<?php while ($jump_menu_query->have_posts()) : $jump_menu_query->the_post(); ?>				
										<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
									<?php endwhile; ?>
								</select>
							</form>
						</div><!--End jump-menu -->
						
						<div class="row">
							<ul class="eight columns">
								<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
									<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>">Department Website</a></li>
								<?php endif; ?>

								<?php if ( get_post_meta($post->ID, 'ecpt_facultypage', true) ) : ?>
									<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_facultypage', true); ?>">Faculty</a></li>
								<?php endif; ?>

								<?php if ( get_post_meta($post->ID, 'ecpt_undergraduatepage', true) ) : ?>
									<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_undergraduatepage', true); ?>">Undergraduate</a></li>
								<?php endif; ?>

								<?php if ( get_post_meta($post->ID, 'ecpt_graduatepage', true) ) : ?>
									<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_graduatepage', true); ?>">Graduate</a></li>
								<?php endif; ?>
							</ul>
						</div>
				</div>
		</section>
		
	</div>
</div>
