(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	// Back to Top - by CodyHouse.co - https://github.com/CodyHouse/back-to-top
	// util.js -- Utility function -- Slimmed down to essential functions

	function fsbUtil () {};

	/* 
		class manipulation functions
	*/

	fsbUtil.addClass = function(el, className) {
		var classList = className.split(' ');
	 	if (el.classList) el.classList.add(classList[0]);
	 	else if (!fsbUtil.hasClass(el, classList[0])) el.className += " " + classList[0];
	 	if (classList.length > 1) fsbUtil.addClass(el, classList.slice(1).join(' '));
	};

	fsbUtil.removeClass = function(el, className) {
		var classList = className.split(' ');
		if (el.classList) el.classList.remove(classList[0]);	
		else if(fsbUtil.hasClass(el, classList[0])) {
			var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
			el.className=el.className.replace(reg, ' ');
		}
		if (classList.length > 1) fsbUtil.removeClass(el, classList.slice(1).join(' '));
	};

	/* 
		Animation curves
	*/
	Math.easeInOutQuad = function (t, b, c, d) {
		t /= d/2;
		if (t < 1) return c/2*t*t + b;
		t--;
		return -c/2 * (t*(t-2) - 1) + b;
	};

	$(document).ready( function() {

		// Set button behaviour
		var fsbButton = document.getElementsByClassName("fsb-button")[0],
			floatingShareVisibleClass = "floating-share--is-visible",
			floatingShareFadeOutClass = "floating-share--fade-out",
			fsbPositionClass = fsbVars.fsbPositionClass,
			fsbStyleClass = fsbVars.fsbStyleClass,
			fsbBorderClass = fsbVars.fsbBorderClass,
			fsbColorSchemeClass = fsbVars.fsbColorSchemeClass,
			fsbOffset = fsbVars.fsbOffset,
			fsbOffsetOpacity = fsbVars.fsbOffsetOpacity,
			fsbScrolling = false,
			fsbDevice = fsbVars.fsbDevice,
			shareModal = document.querySelector(".fsb-modal"),
			shareModalBg = document.querySelector(".fsb-modal-background"),
			shareSheet = document.querySelector(".fsb-modal-content"),
			closeButton = document.querySelector(".fsb-modal-close");

		fsbUtil.addClass(fsbButton, fsbPositionClass +" "+ fsbStyleClass +" "+ fsbBorderClass +" "+ fsbColorSchemeClass);

		// Define scroll behaviour

		if ( fsbButton ) {
			//update back to top visibility on scrolling
			window.addEventListener("scroll", function(event) {
				if( !fsbScrolling ) {
					fsbScrolling = true;
					(!window.requestAnimationFrame) ? setTimeout(checkBackfloatingShare, 250) : window.requestAnimationFrame(checkBackfloatingShare);
				}
			});

		}

		function checkBackfloatingShare() {
			var windowTop = window.scrollY || document.documentElement.scrollTop;

			if ( windowTop > fsbOffset ) {
				fsbUtil.addClass(fsbButton, floatingShareVisibleClass)
			} else {
				fsbUtil.removeClass(fsbButton, floatingShareVisibleClass + " " + floatingShareFadeOutClass)
			}

			if ( windowTop > fsbOffsetOpacity ) {
				fsbUtil.addClass(fsbButton, floatingShareFadeOutClass)
			}

			fsbScrolling = false;
		}

		// Define sharesheet behaviour. Reference: https://css-tricks.com/how-to-use-the-web-share-api/

		fsbButton.addEventListener("click", event => {

			if ( fsbDevice == "mobile" ) {

				if (navigator.share) { 
					navigator.share({
						title: document.title,
						url: window.location.href
					}).then(() => {
						console.log("Thanks for sharing!");
					})
					.catch(console.error);
				}					

			} else if ( fsbDevice == "desktop" ) {

				shareModal.classList.add("is-active");
				console.log("This should show desktop sharesheet");

			}

		});

		shareModalBg.addEventListener("click", event => {
			
			shareModal.classList.remove("is-active");

		});

		closeButton.addEventListener("click", event => {
			
			shareModal.classList.remove("is-active");

		});

	});

})( jQuery );
