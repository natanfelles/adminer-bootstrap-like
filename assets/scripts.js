/*!
 * Adminer Bootstrap-Like Design
 *
 * @author  Natan Felles, https://natanfelles.github.io <natanfelles@gmail.com>
 * @link    https://github.com/natanfelles/adminer-bootstrap-like
 * @link    https://www.adminer.org/plugins/#use
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
 */
(function(window) {
	window.addEventListener('load', function() {
		adminerDesign.init();
	}, false);

	var adminerDesign = {

		init: function() {
			adminerDesign.h1 = document.querySelector('#menu h1');
			adminerDesign.logins = document.getElementById('logins');
			adminerDesign.dbs = document.getElementById('dbs');
			adminerDesign.links = document.querySelector('#menu .links');
			adminerDesign.tables = document.getElementById('tables');
			adminerDesign.menuMessage = document.querySelector('#menu .message');
			adminerDesign.breadcrumb = document.getElementById('breadcrumb');
			adminerDesign.lang = document.getElementById('lang');
			adminerDesign.logout = document.getElementById('logout');
			adminerDesign.content = document.getElementById('content');
			adminerDesign.pages = document.getElementsByClassName('pages')[0];
			adminerDesign.menu = document.getElementById('menu');

			adminerDesign.setPositions();
			adminerDesign.setTables();
			adminerDesign.setSensor();
			//adminerDesign.setSelects();
		},

		setPositions: function() {
			if (adminerDesign.logins) {
				adminerDesign.logins.style.top = adminerDesign.h1.offsetHeight - 1 + 'px';
			}

			if (adminerDesign.dbs) {
				adminerDesign.dbs.style.top = adminerDesign.h1.offsetHeight + 'px';
			}

			if (adminerDesign.links) {
				adminerDesign.links.style.top = adminerDesign.h1.offsetHeight + adminerDesign.dbs.offsetHeight + 'px';
			}

			if (adminerDesign.tables) {
				adminerDesign.tables.style.top = adminerDesign.h1.offsetHeight + adminerDesign.dbs.offsetHeight + adminerDesign.links.offsetHeight - 1 + 'px';
			}

			if (adminerDesign.menuMessage) {
				adminerDesign.menuMessage.style.top = adminerDesign.h1.offsetHeight + adminerDesign.dbs.offsetHeight + adminerDesign.links.offsetHeight + 'px';
			}

			if (adminerDesign.lang && adminerDesign.logout) {
				adminerDesign.lang.style.right = adminerDesign.logout.offsetWidth + 8 + 'px';
			}

			// console.log(this.content);
			// console.log(window.getComputedStyle(this.content, null).getPropertyValue('padding-top'));

			adminerDesign.content.style.minHeight = window.innerHeight -
				window.getComputedStyle(adminerDesign.content, null).getPropertyValue('padding-top').replace('px', '') -
				window.getComputedStyle(adminerDesign.content, null).getPropertyValue('padding-bottom').replace('px', '') -
				window.getComputedStyle(adminerDesign.content, null).getPropertyValue('margin-top').replace('px', '') -
				window.getComputedStyle(adminerDesign.content, null).getPropertyValue('margin-bottom').replace('px', '') +
				'px';
		},

		setTables: function() {
			if (!adminerDesign.tables) {
				return;
			}

			adminerDesign.tables.style.height = window.innerHeight - adminerDesign.tables.offsetTop + 'px';
			var a = document.querySelectorAll('#tables li a');

			for (var i = 0; i < a.length; i++) {

				if (a[i].classList.contains('structure')) {
					a[i].title = a[i].title + ' - ' + a[i].innerHTML;

					a[i].parentNode.addEventListener('click', function() {
						window.location = this.children[1].href;
					});

					if (a[i].offsetWidth > 200) {
						a[i].innerHTML = a[i].innerHTML.substring(0, 28) + '...';
					}
				}

				if (a[i].classList.contains('active')) {
					// console.log('active');
					a[i].parentNode.classList += 'active';
				}
			}

			var active = document.querySelector('#tables .active');

			if (active) {
				adminerDesign.tables.scrollTop = active.offsetTop;
			}
		},

		setSensor: function() {
			var div = document.createElement('div');
			div.setAttribute('id', 'sensor');
			document.body.appendChild(div);
			var sensor = document.getElementById('sensor');

			function toggleMenu(state) {
				var menu = document.getElementById('menu');
				var content = document.getElementById('content');
				var breadcrumb = document.getElementById('breadcrumb');
				var pages = document.querySelector('.footer p');

				if (state === 'closed') {
					menu.style.display = 'none';
					content.style.marginLeft = 0;

					if (breadcrumb) {
						breadcrumb.style.paddingLeft = '40px';
					}

					if (pages) {
						pages.style.left = 0;
					}

					localStorage.setItem('menu', 'closed');
				} else {
					menu.style.display = 'block';
					content.style.marginLeft = '266px';

					if (breadcrumb) {
						breadcrumb.style.paddingLeft = '306px';
					}

					if (pages) {
						pages.style.left = '266px';
					}

					localStorage.setItem('menu', 'open');
				}
			}

			toggleMenu(localStorage.getItem('menu'));

			sensor.addEventListener('mouseover', function() {
				var state = localStorage.getItem('menu') === 'open' ? 'closed' : 'open';
				toggleMenu(state);
			});
		},

		setSelects: function() {
			var selects = document.querySelectorAll("select[name='Collation'], select[name*='collation']");

			console.log(selects);
			for (var i = 0; i < selects.length; i++) {
				var options = selects[i];
				console.log(options);
				for (var o = 0; o < options.length; o++) {
					console.log(options[o]);
				}
			}
		},

	};
})(window);
