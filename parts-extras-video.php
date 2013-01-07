						<div class="row">
							<div class="ten columns centered grey_bg no-gutter video_thumb">
								<a href="#" data-reveal-id="modal_dept_video">
									<span class="icon-play"></span><?php the_post_thumbnail('full'); ?>
									<h3><?php the_title(); ?></h3>
									<?php the_excerpt(); ?>
								</a>
							</div>
						</div>
				</div>
	</div>
</div> <!-- End #landing -->
<div id="modal_dept_video" class="reveal-modal expand">
	<div class="flex-video">
		<?php the_content(); ?>
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>