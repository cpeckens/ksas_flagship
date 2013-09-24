/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'flagship\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-calendar' : '&#xe001;',
			'icon-printer' : '&#xe002;',
			'icon-home' : '&#xe003;',
			'icon-search' : '&#xe004;',
			'icon-user' : '&#xe005;',
			'icon-new-tab' : '&#xe006;',
			'icon-new-tab2' : '&#xe007;',
			'icon-facebook' : '&#xe008;',
			'icon-vimeo' : '&#xe009;',
			'icon-mail' : '&#xe013;',
			'icon-share' : '&#xe016;',
			'icon-download' : '&#xe021;',
			'icon-file-pdf' : '&#xe024;',
			'icon-file-word' : '&#xe025;',
			'icon-file-excel' : '&#xe026;',
			'icon-file-zip' : '&#xe027;',
			'icon-play' : '&#xe02a;',
			'icon-mobile' : '&#xe02b;',
			'icon-phone' : '&#xe012;',
			'icon-youtube' : '&#xe02c;',
			'icon-arrow-right-2' : '&#xe010;',
			'icon-comments' : '&#xe011;',
			'icon-camera' : '&#xe02d;',
			'icon-video' : '&#xe02e;',
			'icon-newspaper' : '&#xe02f;',
			'icon-calendar-2' : '&#xf073;',
			'icon-globe' : '&#xf0ac;',
			'icon-location' : '&#xe000;',
			'icon-arrow-right' : '&#xe01c;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};