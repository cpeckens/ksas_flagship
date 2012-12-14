var $j = jQuery.noConflict();


//***********FIELDS OF STUDY SCRUPTS***********
$j(function() {
	//set isotope variables
   var $container = $j('#fields_container');

   $container.isotope({
        itemSelector: '.mobile-field',
        layoutMode : 'fitRows'
    });

    //Create filter buttons
$j('#filters a').click(function(){
  var selector = $j(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;
});
	//Setup quicksearch
    $j('#id_search').quicksearch('div.mobile-field', {
    	delay: 100,
    	bind: 'onchange keyup',
		noResults: '#noresults',
        'show': function() {
            $j(this).addClass('quicksearch-match');
        },
        'hide': function() {
            $j(this).removeClass('quicksearch-match');
        }
    }).keyup(function(){ //Add function to match quicksearch to isotopefilter
        setTimeout( function() {
            $container.isotope({ filter: '.quicksearch-match' }).isotope(); 
        }, 100 );
    });
    


});