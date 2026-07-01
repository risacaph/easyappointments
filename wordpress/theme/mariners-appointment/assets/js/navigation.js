/**
 * Mobile navigation toggle for the Mariners Appointment theme.
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		var nav = document.querySelector( '.main-navigation' );

		if ( ! nav ) {
			return;
		}

		var toggle = nav.querySelector( '.menu-toggle' );

		if ( ! toggle ) {
			return;
		}

		toggle.addEventListener( 'click', function () {
			var expanded = nav.classList.toggle( 'toggled' );
			toggle.setAttribute( 'aria-expanded', expanded ? 'true' : 'false' );
		} );
	} );
} )();
