  <footer>
  	<div class="row" role="navigation">
		<?php wp_nav_menu( array( 
		'theme_location' => 'quick_links', 
		'menu_class' => 'nav-bar', 
		'fallback_cb' => 'foundation_page_menu', 
		'container' => 'nav', 
		'container_id' => 'quicklinks',
		'container_class' => 'three column hide-for-small', 
		'walker' => new foundation_navigation() ) ); ?>
  		
		<?php wp_nav_menu( array( 
		'theme_location' => 'footer_links', 
		'menu_class' => 'inline-list', 
		'fallback_cb' => 'foundation_page_menu', 
		'container' => 'nav', 
		'container_class' => 'seven column', 
		'walker' => new foundation_navigation() ) ); ?>
		
		<nav class="two column iconfont" id="social-media">
			<a href="http://facebook.com/jhuksas" title="Facebook"><span class="icon-facebook"></span><span class="hide">Facebook</span></a>
			<a href="http://vimeo.com/channels/jhuksas" title="Vimeo"><span class="icon-vimeo"></span><span class="hide">Vimeo</span></a>
		</nav>
  	</div>
  	<div class="row" id="copyright" role="content-info">
  		<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, Zanvyl Krieger School of Arts & Sciences, 3400 N. Charles St, Baltimore, MD 21218</p>
  	</div>
		<div class="row">
  		<div class="four columns centered">
				<a href="http://www.jhu.edu"><img src="<?php echo get_template_directory_uri() ?>/assets/images/university.jpg" alt="Johns Hopkins University logo" /></a>
			</div>
		</div>
  </footer>
  
  <?php locate_template('parts-script-initiators.php', true, false); ?>
	</body>
</html>