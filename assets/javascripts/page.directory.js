var $j = jQuery.noConflict();


//***********FIELDS OF STUDY SCRUPTS***********
$j(function() {
	//set isotope variables
   var $container = $j('#directory');

   $container.isotope({
        itemSelector: '.person',
        layoutMode : 'fitRows'
    });


	//Setup quicksearch
    $j('#id_search').quicksearch('li.person', {
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