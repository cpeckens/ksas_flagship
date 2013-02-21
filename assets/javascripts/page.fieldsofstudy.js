var $j = jQuery.noConflict();


//***********FIELDS OF STUDY SCRIPTS***********

$j(function() {
	//set isotope variables
   var $container = $j('#fields_container'),
   		filters = {};

   $container.isotope({
        itemSelector: '.mobile-field',
        layoutMode : 'fitRows'
    });

    // filter buttons
    $j('.filter button a').click(function(){
      var $this = $j(this);
      // don't proceed if already selected
      if ( $this.hasClass('selected') ) {
        return;
      }
      
      var $optionSet = $this.parents('.option-set');
      // change selected class
      $optionSet.find('.selected').removeClass('selected');
      $this.addClass('selected');
      
      // store filter value in object
      // i.e. filters.color = 'red'
      var group = $optionSet.attr('data-filter-group');
      filters[ group ] = $this.attr('data-filter');
      // convert object into array
      var isoFilters = [];
      for ( var prop in filters ) {
        isoFilters.push( filters[ prop ] )
      }
      var selector = isoFilters.join('');
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
