<!***********FOUNDATION SCRIPTS**************>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.mediaQueryToggle.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.forms.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.reveal.js"></script> <!-- ALL -->
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.navigation.js"></script> <!-- ALL -->
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.buttons.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.tabs.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.tooltips.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.accordion.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.placeholder.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.alerts.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.topbar.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.joyride.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.clearing.js"></script> <!-- Photo Index -->
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.magellan.js"></script>
  
<!***********ALL PAGES**************>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/app.js"></script>
  <!-- Add "external" class to hyperlinks not on the krieger.jhu.edu domain -->
  <script>
	  jQuery('a').filter(function() {
		  return this.hostname && this.hostname !== location.hostname;
	  }).addClass("external_link");
  </script>
    
<!***********FIELDS OF STUDY**************>
  <?php if ( is_page_template( 'template-fieldsofstudy.php' ))  { ?>
  	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.isotope.js"></script>
  	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.quicksearch.js"></script>  	
  	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/page.fieldsofstudy.js"></script>
  	
  		<?php if (isset($_POST['home_search'])) { ?>
	  		<script>
		  		var $j = jQuery.noConflict();
		  		$j(window).load(function() {
		  		    $j('#id_search').trigger('keyup'); // Trigger the listener
		  		});
	  		</script>
	  	<?php } else { ?>
	  		<script>
		  		var $j = jQuery.noConflict();
		  		$j(window).load(function() {
		  		    var filterFromQuerystring = getParameterByName('filter');
		  		    $j('#filters a[data-filter=".' + filterFromQuerystring  + '"]').click();
		  		});
	  		</script>
  		<?php } ?> 
	<?php } ?> 
<!***********DIRECTORY**************>
<?php if ( is_page_template( 'template-directory.php' ))  { ?>
  	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.isotope.js"></script>
  	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.quicksearch.js"></script>  	
  	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/page.directory.js"></script>
<?php } ?>

<!***********RESEARCH**************>
<?php if ( is_page('research')) { ?>
	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.orbit.js"></script>
	<script>
		var $l = jQuery.noConflict();
		$l(window).load(function() {
        $l("#slider").orbit({
        	'timer' : true,
        	'advanceSpeed':5000,
        	'directionalNav' : false,
	        'bullets' : true,		
	        'bulletThumbs': true,
        	'fluid' : '527x424',
	        
        });
   });
   </script>
<?php } ?>


<!***********ABOUT**************>
<?php if ( is_page('about')) { ?>
	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.orbit.js"></script>
	<script>
		var $l = jQuery.noConflict();
		$l(window).load(function() {
        $l("#slider").orbit({
        	'timer' : true,
        	'advanceSpeed':4000,
        	'directionalNav' : false,
	        'bullets' : false,		
        	'fluid' : '500x445',
        });
   });
   </script>
<?php } ?>

<!***********NEWS**************>
<?php if ( is_page('news')) { ?>
	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/easyXDM.min.js"></script>
	<script>
	    new easyXDM.Socket({
	        remote: "http://krieger.jhu.edu/calendar/calendar_holder.html?url=http://krieger.jhu.edu/calendar/krieger_all/list/byday",
	        container: document.getElementById("calendar_container"),
	        onMessage: function(message, origin){
	            this.container.getElementsByTagName("iframe")[0].style.height = message + "px";
	        }
	    });
	</script>
<?php } ?>

<?php if ( is_page('events')) { ?>
	<script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/easyXDM.min.js"></script>
	<script>
	    new easyXDM.Socket({
	        remote: "http://krieger.jhu.edu/calendar/calendar_holder.html?url=http://krieger.jhu.edu/calendar/krieger_all",
	        container: document.getElementById("calendar_container"),
	        onMessage: function(message, origin){
	            this.container.getElementsByTagName("iframe")[0].style.height = message + "px";
	            this.container.getElementsByTagName("iframe")[0].style.width = "100%";
	        }
	    });
	</script>
<?php } ?>

<!***********NEWS ITEMS (SINGLE, PHOTO INDEX)**************>
<?php if (  is_singular('post') || is_page_template('template-photo-archive.php') || is_page_template('template-story-archive.php') || is_page_template('template-video-archive.php') || is_page('archive') || is_page('events')) { ?>
	<script>
		var $j = jQuery.noConflict();
		$j(document).ready(function(){
			$j('#menu-item-885').addClass('current_page_ancestor');
			$j('#menu-item-890').addClass('current_page_parent');
			});
	</script>
<?php } ?>

<?php if ( is_singular('people') ) { ?>
	<script>
		var $k = jQuery.noConflict();
		$k(document).ready(function(){
			$k('#menu-item-808').addClass('current_page_ancestor');
			$k('#menu-item-809').addClass('current_page_parent');
			});
	</script>
<?php } ?>
	</body>
</html>