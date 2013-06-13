						<div class="row">
							<div class="ten columns centered grey_bg no-gutter">
								<a href="#" data-reveal-id="modal_dept_video" onclick="ga('send', 'event', 'Video', 'Play', '<?php the_title(); ?>');">
									<div class="video_thumb">
										<span class="icon-play"></span><?php the_post_thumbnail('rss'); ?>
									</div>
									<h3 class="no-margin"><?php the_title(); ?></h3>
									<?php the_excerpt(); ?>
								</a>
							</div>
						</div>
				</div>
	</div>
</div> <!-- End #landing -->
<div id="modal_dept_video" class="reveal-modal large black_bg">
	<div class="flex-video">
		
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>
		<script>
		<?php 
		$vid_url = get_the_content();
		$embed_vid = "[embed]" . $vid_url . "[/embed]"; 
		$wp_embed = new WP_Embed();
		$post_embed = $wp_embed->run_shortcode($embed_vid); ?>
		var $d = jQuery.noConflict();
            $d('a[data-reveal-id="modal_dept_video"]').click( function(){
                $d('<?php echo $post_embed; ?>').appendTo('#modal_dept_video .flex-video');
            });
        </script>