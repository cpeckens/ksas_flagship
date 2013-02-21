<article class="four columns">
	<a href="#" data-reveal-id="modal_home_<?php the_id(); ?>_video">
		<div class="video_thumb">
			<span class="icon-play"></span><?php the_post_thumbnail('rss'); ?>
		</div>
		<h3><?php the_title(); ?></h3>
		<summary><?php the_excerpt(); ?></summary>
	</a>
</article>
<div id="modal_home_<?php the_id(); ?>_video" class="reveal-modal large black_bg">
	<div class="flex-video">
		<?php the_content(); ?>
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>