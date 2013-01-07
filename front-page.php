<?php get_header(); 
	//Set Evergreen Query Parameters
	$flagship_evergreen_query = new WP_Query(array(
		'post_type' => 'evergreen',
		'orderby' => 'rand',
		'posts_per_page' => '1'));
?>		

<div class="row">
	<section class="seven columns end offset-top" id="evergreen">
		<?php while ($flagship_evergreen_query->have_posts()) : $flagship_evergreen_query->the_post(); ?>
			<!-- Set background image. Resolution varies based on size -- Desktop, Tablet, Mobile -->
				<style>
					body { background: #000 url('<?php echo get_post_meta($post->ID, 'ecpt_fullimage', true); ?>') no-repeat top center; }
					@media only screen and (max-width: 768px) { 
						body { background: #000 url('<?php echo get_post_meta($post->ID, 'ecpt_fullimage', true); ?>') no-repeat top center; }
						}
					@media only screen and (max-width: 420px) { 
						body { background: #000 url('<?php echo get_post_meta($post->ID, 'ecpt_fullimage', true); ?>') no-repeat top center; }
						}
				</style>
				
				<h1 class="text-shadow"><?php the_title(); ?></h1>
				<span class="text-shadow"><?php the_content();?></span>
		<?php endwhile; ?>
	</section>
</div>

<section class="row" id="field_search">
<dl class="tabs contained">
  <dd class="active black">Fields of Study</dd>
</dl>
<ul class="tabs-content contained">
  <li class="active">
	  <form method="post" action="academics/fields">

	  	<div class="row">	
		<!-- Search Bar -->
		<div class="twelve columns">
			<input type="submit" class="icon-search" value="&#xe004;" />
		    <input type="text" name="home_search" id="field_search" placeholder="Search fields of study by major, minor, interests, or name" />
		</div>
	</div>
	
	<div class="row" id="filters">
			<label class="one column">EXPLORE:</label>
			<button class="blue"><a href="academics/fields" data-filter="*">View All</a></button>
			<button class="green"><a href="academics/fields?filter=department" data-filter=".department">Departments</a></button>
			<button class="purple"><a href="academics/fields?filter=interdisciplinary" data-filter=".interdisciplinary">Interdisciplinary</a></button>
			<button class="fushia"><a href="academics/fields?filter=arts" data-filter=".arts">The Arts</a></button>
			<button class="yellow"><a href="academics/fields?filter=humanities" data-filter=".humanities">Humanities</a></button>
			<button class="orange"><a href="academics/fields?filter=natural" data-filter=".natural">Natural Sciences</a></button>
			<button class="blue"><a href="academics/fields?filter=social" data-filter=".social">Social Sciences</a></button>
	</div>	    
	</form>
  </li>
</ul>
</section>

<section class="row black radius10" id="news_feed">
	<article class="four columns">
		<a href="#" class="th"><img src="http://placehold.it/305x200"></a>
		<h4>Headline Goes here</h4>
		<summary>This is the subhead</summary>
		<source>Arts & Sciences Magazine></article>
	</article>
	<article class="four columns">
		<a href="#" class="th"><img src="http://placehold.it/305x200"></a>
		<h4>Headline Goes here</h4>
		<summary>This is the subhead</summary>
		<source>Arts & Sciences Magazine></article>
	</article>
	<article class="four columns">
		<a href="#" class="th"><img src="http://placehold.it/305x200"></a>
		<h4>Headline Goes here</h4>
		<summary>This is the subhead</summary>
		<source>Arts & Sciences Magazine></article>
	</article>
</section>

<?php get_footer(); ?>