/**
 * Custom theme scripts.
 */
( function( $ ) {
	'use strict';

	// Cache the DOM.
	var $body = $( 'body.single-post' ),
		$buttons = $body.find( '.sharedaddy' ),
		$content = $body.find( '.entry-content' );

	var offset = $( '#main' ).offset().top;

	// Bind events.
	$( window ).on( 'scroll', debounce( stickSharingButtons, 16.6666666667 ) ); // 60 FPS

	function stickSharingButtons() {

		// Quick return on smaller screens.
		if ( 1024 > $( window ).width() ) {
			return;
		}

		// Show buttons.
		if ( $( window ).scrollTop() > offset ) {
			$buttons.addClass( 'visible' );
		} else {
			$buttons.removeClass( 'visible' );
		}
	}

	/**
	 * Debounce function.
	 *
	 * https://davidwalsh.name/javascript-debounce-function
	 */
	function debounce( func, wait, immediate ) {
		var timeout;

		return function() {

			var context = this,
				args = arguments;

			var later = function() {
				timeout = null;
				if ( ! immediate ) {
					func.apply( context, args );
				}
			};

			var callNow = immediate && ! timeout;

			clearTimeout( timeout );

			timeout = setTimeout( later, wait );

			if ( callNow ) {
				func.apply( context, args );
			}
		};
	};

} ( jQuery ) );

( function( $ ) {
	// Cache the DOM.
	$gallery = $( ".tiled-gallery" );

	// Fire the event on load.
	updateGallery();
	
	// Wrap the gallery in a div if it doesn't have an outset class.
	function updateGallery() {
		if ( ! $gallery.parent().hasClass( 'outset' ) ) {
			$gallery.wrap( "<div class='tiled-gallery-wrap'></div>" );
		}
	}
} ( jQuery ) );
