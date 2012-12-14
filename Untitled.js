//***********FIELDS OF STUDY SCRIPTS***********
	//-----------Isotope.js - Filter buttons

var $container = $j('#fields_container');
		// initialize isotope
$container.isotope({
	layoutMode : 'fitRows'
  });

  		// filter items when filter link is clicked
$j('#filters a').click(function(){
  var selector = $j(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;
});

	//-----------Quicksearch.js - Realtime search results
$j(document).ready(function () {
	$j("#id_search").quicksearch("div.mobile-field", {
		delay: 100,
		noResults: '#noresults',
		loader: 'span.loading',
		show: function () {
			$j(this).addClass('search-visible');
			$j(this).removeClass('search-hidden');
			
		},
		hide: function () {
			$j(this).addClass('search-hidden');
			$j(this).removeClass('search-visible');
		}

	});
});


$j(function() {

   var $container = $j('#fields_container');

   $container.isotope({
        itemSelector: '.mobile-field',
        layoutMode : 'fitRows'
    });

$j('#filters a').click(function(){
  var selector = $j(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;
});

    $j('#id_search').quicksearch('#container .item', {
    	delay: 100,
		noResults: '#noresults',
		loader: 'span.loading',
        'show': function() {
            $j(this).addClass('quicksearch-match');
        },
        'hide': function() {
            $j(this).removeClass('quicksearch-match');
        }
    }).keyup(function(){
        setTimeout( function() {
            $container.isotope({ filter: '.quicksearch-match' }).isotope(); 
        }, 100 );
    });

});