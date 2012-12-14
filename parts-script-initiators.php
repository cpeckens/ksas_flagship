  <!-- Javascript Files -- Need to remove uneccessary and compressed-->
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.mediaQueryToggle.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.forms.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.reveal.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.orbit.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.navigation.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.buttons.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.tabs.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.tooltips.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.accordion.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.placeholder.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.alerts.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.topbar.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.joyride.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.clearing.js"></script>
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/jquery.foundation.magellan.js"></script>
  
  <!--Custom JS Plugins -->
  <script src="<?php echo get_template_directory_uri() ?>/assets/javascripts/app.js"></script>
  
  <!-- Javascript Files -- Conditionals-->
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
<?php } ?> <!-- End fields of study scripts -->
  
</body>
</html>