/* Add "external" class to hyperlinks not on the krieger.jhu.edu domain */

$('a').filter(function() {
   return this.hostname && this.hostname !== location.hostname;
}).addClass("external");
