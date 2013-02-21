<?php get_header(); ?>

<div class="row wrapper radius10">
	<div class="twelve columns">
			<dl class="tabs mobile">
				<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) : ?><dd class="active"><a href="#bio">Biography</a></dd><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_research', true) ) : ?><dd><a href="#research">Research</a></dd><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_teaching', true) ) : ?><dd><a href="#teaching">Teaching</a></dd><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_publications', true) ) : ?><dd><a href="#publications">Publications</a></dd><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab_title', true) ) : ?><dd><a href="#extra"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab_title', true); ?></a></dd><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab_title2', true) ) : ?><dd><a href="#extra2"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab_title2', true); ?></a></dd><?php endif; ?>			  
			</dl>
			
			<ul class="tabs-content">
				<?php if ( get_post_meta($post->ID, 'ecpt_bio', true) ) : ?>
				<li class="active" id="bioTab">
					<div class="four columns">
						<?php if ( get_post_meta($post->ID, 'ecpt_people_photo', true) ) : ?><img src="<?php echo get_post_meta($post->ID, 'ecpt_people_photo', true); ?>" /><?php endif; ?>
						<h4><?php the_title() ?></h4>
						<h6><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h6>
				
						<p class="listing"><?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?><b>Office:</b> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?><br><?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_hours', true) ) : ?><b>Office Hours:</b> <?php echo get_post_meta($post->ID, 'ecpt_hours', true); ?><br><?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?><b>Phone:</b> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?><br><?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?><b>Fax:</b> <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?><br><?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?><b>Email:</b> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"><?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a><br><?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_cv', true) ) : ?><b><a href="<?php echo get_post_meta($post->ID, 'ecpt_cv', true); ?>">Curriculum Vitae</a></b> (PDF)<br><?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_website', true) ) : ?><a href="<?php echo get_post_meta($post->ID, 'ecpt_website', true); ?>" target="_blank">View personal website</a><?php endif; ?></p>
					</div>
					<?php echo get_post_meta($post->ID, 'ecpt_bio', true); ?>
				</li><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_research', true) ) : ?><li id="researchTab"><?php echo get_post_meta($post->ID, 'ecpt_research', true); ?></li><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_teaching', true) ) : ?><li id="teachingTab"><?php echo get_post_meta($post->ID, 'ecpt_teaching', true); ?></li><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_publications', true) ) : ?><li id="publicationsTab"><?php echo get_post_meta($post->ID, 'ecpt_publications', true); ?></li><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab', true) ) : ?><li id="extraTab"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab', true); ?></li><?php endif; ?>
				
				<?php if ( get_post_meta($post->ID, 'ecpt_extra_tab2', true) ) : ?><li id="extra2Tab"><?php echo get_post_meta($post->ID, 'ecpt_extra_tab2', true); ?></li><?php endif; ?>			
			</ul>
			</div>		
		</div>

<?php get_footer(); ?>
