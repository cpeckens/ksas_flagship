;(function ($, window, undefined) {
  'use strict';

  var $doc = $(document),
      Modernizr = window.Modernizr;

  $(document).ready(function() {
    $.fn.foundationAccordion        ? $doc.foundationAccordion() : null;
    $.fn.foundationNavigation       ? $doc.foundationNavigation() : null;
    $.fn.foundationTabs             ? $doc.foundationTabs() : null;
    $.fn.foundationClearing         ? $doc.foundationClearing() : null;
  });

  // Hide address bar on mobile devices (except if #hash present, so we don't mess up deep linking).
  if (Modernizr.touch && !window.location.hash) {
    $(window).load(function () {
      setTimeout(function () {
        window.scrollTo(0, 1);
      }, 0);
    });
  }
})(jQuery, this);


//***********For fields of study filters***********
function getParameterByName(name)
{
  name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
  var regexS = "[\\?&]" + name + "=([^&#]*)";
  var regex = new RegExp(regexS);
  var results = regex.exec(window.location.search);
  if(results == null)
    return "";
  else
    return decodeURIComponent(results[1].replace(/\+/g, " "));
}

//***********For Sidebar pages***********
var $q = jQuery.noConflict();
var highestCol = Math.max($q('#sidebar').height(),$q('.wrapper').height());
$q('#sidebar, .wrapper').height(highestCol);

//**************For Footer and Student Voices videos*******************//
var $j = jQuery.noConflict();
   $j('#right').click(function () {
      $j('#video_scroll').animate({
        marginLeft: -="200px"
      }, "fast");
   });

   $j('#left').click(function () {
      $j('#video_scroll').animate({
        marginLeft: +="200px"
      }, "fast");
   });
   
   $j('#right_foot').click(function () {
      $j('#footer_scroll').animate({
        marginLeft: -="200px"
      }, "fast");
   });
   
  $j('#left_foot').click(function () {
      $j('#footer_scroll').animate({
       marginLeft: +="200px"
      }, "fast");
   });