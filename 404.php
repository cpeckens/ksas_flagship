<?php get_header(); ?>

<div class="row wrapper radius10">
	<section class="twelve columns no-gutter" role="main-content">
			<h2>Whoops...</h2>
			<p>This page does not exist.  Try searching</p>
			       <form class="search-form" action="<?php echo site_url('/search'); ?>" method="get">
                    <fieldset>
                        <input type="text" class="input-text" name="q" />
                        <input type="submit" class="button blue_bg" value="Search" />
                    </fieldset>
       </form>        

	</section>
</div>

<?php get_footer(); ?>

