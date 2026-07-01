/**
 * Front-end enhancement for the Mariners Appointment embed.
 *
 * Progressive enhancement: if the embedded booking page posts a height message
 * to the parent window (`{ marinersAppointmentHeight: <px> }`), the iframe is
 * resized to fit its content. Otherwise the configured fixed height is kept.
 */
( function () {
	'use strict';

	function onMessage( event ) {
		if ( ! event || ! event.data ) {
			return;
		}

		var data = event.data;

		if ( typeof data !== 'object' || typeof data.marinersAppointmentHeight === 'undefined' ) {
			return;
		}

		var height = parseInt( data.marinersAppointmentHeight, 10 );

		if ( ! height || height < 200 ) {
			return;
		}

		var iframes = document.querySelectorAll( '.mariners-appointment-iframe' );

		for ( var i = 0; i < iframes.length; i++ ) {
			if ( iframes[ i ].contentWindow === event.source ) {
				iframes[ i ].style.height = height + 'px';
			}
		}
	}

	window.addEventListener( 'message', onMessage, false );
} )();
