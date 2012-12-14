<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title></title>
  
  <!-- CSS Files: All pages -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/stylesheets/foundation.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/stylesheets/flagship.css">
  <link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/c5f514c7-d786-4bfb-9484-ea6c8fbd263f.css"/>
  <!-- CSS Files: Conditionals -->
  
  <!-- Modernizr and Jquery Script -->
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/modernizr.foundation.js"></script>
  <?php wp_enqueue_script('jquery'); ?> 
  <?php wp_head(); ?>


  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body class="<?php echo the_slug(); ?>">
	<header>
		<div class="row">
			<div id="search-bar" class="offset-by-eight four columns">
				<div class="row">
					<div class="six columns">
						<form>
							<input type="submit" class="icon-search" value="&#xe004;" />
							<input type="text" placeholder="Search" />
						</form>
					</div>
					<div class="six columns links">
						<a href="#">Directory</a> | 
						<a href="http://my.jhu.edu">MYJHU</a> | 
						<a href="http://jhem.johnshopkins.edu/">JHEM</a>
					</div>
				</div>	
			</div>	<!-- End #search-bar	 -->
		</div>
		<div class="row">
			<?php wp_nav_menu( array( 
				'theme_location' => 'main_nav', 
				'menu_class' => 'nav-bar', 
				'fallback_cb' => 'foundation_page_menu', 
				'container' => 'nav',
				'container_id' => 'main_nav', 
				'container_class' => 'twelve columns',
				'depth' => 2,
				'walker' => new foundation_toplevel_navigation() )); ?> 
		</div>
		<div class="row">
		<?php wp_nav_menu( array( 
				'theme_location' => 'main_nav', 
				'menu_class' => 'sub-nav', 
				'fallback_cb' => 'foundation_page_menu', 
				'container' => 'nav',
				'container_id' => 'secondary_nav', 
				'container_class' => 'twelve columns hide-for-medium-down',
				'depth' => 2) ); ?> 
		</div>

	</header>