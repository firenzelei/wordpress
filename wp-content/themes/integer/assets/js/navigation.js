/**
 * navigation.js
 *
 * Primary navigation enhancements.
 */

/**
 * Set of primary navigation enhancements:
 * - Adds dropdown toggle buttons and aria and role attributes.
 * - Introduces toggle functionality.
 * - Handles :focus nicely.
 */
( function( $ ) {
	'use strict';

	// Cache the DOM.
	var $header = $( '#masthead' ),
		$nav = $header.find( '#site-navigation' ),
		$navUl = $nav.find( '#primary-menu' ),
		$navItemHasSubMenu = $navUl.find( '.menu-item-has-children' ),
		$navItemHasSubMenuLink = $navUl.find( '.menu-item-has-children > a' ),
		$navLink = $nav.find( 'a' ),
		$navLinkEmpty = $nav.find( 'a[href="#"]' ),
		$navToggle = $header.find( '#site-navigation-toggle' ),
		$navToggleText = $navToggle.find( '.menu-toggle-text' ),
		$navToggleIcon = $navToggle.find( '.menu-toggle-icon' );

	// Initial markup updates.
	markupUpdate();

	// Bind events.
	$navLink.on( 'focusin focusout', toggleNavItemFocus );
	$navToggle.on( 'click', toggleNav );
	$( document ).on( 'customize-preview-menu-refreshed', reinitNav );
	$( document ).keyup( escClose );
	$navLinkEmpty.on( 'click', toggleSubNavEmptyLink );

	/**
	 * Add 'role' and 'aria' attributes.
	 */
	function markupUpdate() {

		// Set 'role' attribute to 'navigation' on the <nav> element.
		$nav.attr( 'role', 'navigation' );

		// Set 'aria-expanded' attribute to 'false' on the <ul> element.
		$navUl.attr( 'aria-expanded', false );

		// Set 'aria-haspopup' attribute to 'true' on <li> elements with submenus.
		$navItemHasSubMenu.attr( 'aria-haspopup', true );

		// Add the dropdown toggle element to menu items that have children.
		$navItemHasSubMenuLink.after( $( '<button></button>' )
			.attr( 'aria-expanded', false )
			.addClass( 'dropdown-toggle' )
			.html( integerScreenReaderText.expand )
			.on( 'click', toggleSubNav )
		);
	}

	/**
	 * Menu toggle functionality.
	 */
	function toggleNav() {
		if ( $nav.hasClass( 'toggled' ) ) {
			closeNav();
		} else {
			openNav();
		}
	}

	/**
	 * Add/Remove toggle-related classes and attributes when clicked on the toggle.
	 */
	function toggleSubNav( e ) {
		var $this = $( e.target );
		$this.toggleClass( 'toggle-on' );
		$this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
		$this.attr( 'aria-expanded', 'false' === $this.attr( 'aria-expanded' ) ? 'true' : 'false' );
		$this.html( $this.html() === integerScreenReaderText.expand ? integerScreenReaderText.collapse : integerScreenReaderText.expand );
	}

	function toggleSubNavEmptyLink( e ) {

		// Declare variables.
		var $this, $dropdownToggle;

		e.preventDefault();

		$this = $( e.target ),
		$dropdownToggle = $this.next( '.dropdown-toggle' );

		if ( $dropdownToggle ) {
			$dropdownToggle.trigger( 'click' );
		}
	}

	/**
	 * Sets or removes 'focus' class on an <li> element.
	 */
	function toggleNavItemFocus( e ) {
		$( e.target ).parentsUntil( '.nav-menu', 'li' ).toggleClass( 'focus' );
	}

	/**
	 * Re-initialize the menu in the Customizer.
	 */
	function reinitNav( e, params ) {

		var $newNav, $newNavItemHasSubMenuLink;

		if ( 'primary' === params.wpNavMenuArgs.theme_location ) {

			// Variables needed to recreate dropdown toggles.
			$newNav = $( params.newContainer );
			$newNavItemHasSubMenuLink = $newNav.find( '.menu-item-has-children > a' );

			// Re-create dropdown toggles.
			$newNavItemHasSubMenuLink.after( $( '<button></button>' )
				.attr( 'aria-expanded', false )
				.addClass( 'dropdown-toggle' )
				.html( integerScreenReaderText.expand )
				.on( 'click', toggleSubNav )
			);

			// Re-sync expanded states.
			params.oldContainer.find( '.dropdown-toggle.toggle-on' ).each( function() {
				var containerId = $( this ).parent().prop( 'id' );
				$( params.newContainer ).find( '#' + containerId + ' > .dropdown-toggle' ).triggerHandler( 'click' );
			} );
		}
	}

	/**
	 * Opens the menu.
	 */
	function openNav() {
		$nav.addClass( 'toggled' );
		$navToggle.addClass( 'toggled' );

		$navUl.attr( 'aria-expanded', true );
		$navToggleText.text( integerScreenReaderText.close );
		$navToggleIcon.removeClass( 'fa-bars' );
		$navToggleIcon.addClass( 'fa-times' );
	}

	/**
	 * Closes the menu.
	 */
	function closeNav() {
		$nav.removeClass( 'toggled' );
		$navToggle.removeClass( 'toggled' );
		$navUl.attr( 'aria-expanded', false );
		$navToggleText.text( integerScreenReaderText.menu );
		$navToggleIcon.removeClass( 'fa-times' );
		$navToggleIcon.addClass( 'fa-bars' );
	}

	/**
	 * Closes the menu on 'esc' key press.
	 */
	function escClose( e ) {
		if ( 27 === e.keyCode ) {
			closeNav();
		}
	}

} ( jQuery ) );

/**
 * Sticks header if necessary.
 */
( function( $ ) {
	'use strict';

	// Cache the DOM.
	var $body = $( '.sticky-header' ),
		$header = $body.find( '#masthead' );

	var headerHeight = $body.find( '#masthead' ).outerHeight(),
		lastScrollTop = '';

	// Return if sticky header is disabled.
	if ( ! $body.length ) {
		return;
	}

	// Bind events.
	$( window ).on( 'scroll', debounce( fixHeader, 16.6666666667 ) ); // 60 FPS
	$( window ).on( 'resize', resetHeader );

	// Stick header on scroll.
	function fixHeader() {

		// Declare variables.
		var currScrollTop, isScrollingDown, isHeaderVisible;

		if ( 768 > $( window ).width() ) {
			return;
		}

		currScrollTop = $( window ).scrollTop();
		isScrollingDown = currScrollTop > lastScrollTop;
		isHeaderVisible = currScrollTop < headerHeight;

		if ( isScrollingDown ) {
			if ( ! isHeaderVisible && ! $header.hasClass( 'fixed' ) ) {
				$header.addClass( 'fixed minimized' );
				$body.css( 'margin-top', headerHeight );
				$body.removeClass( 'hedaer-stuck' );
			} else if ( ! isHeaderVisible && $header.hasClass( 'fixed' ) ) {
				$header.addClass( 'rolling' ).removeClass( 'maximized' ).addClass( 'minimized' );
				$body.removeClass( 'header-stuck' );
			}
		} else {
			if ( ! isHeaderVisible ) {
				$header.removeClass( 'minimized' ).addClass( 'maximized' );
				$body.addClass( 'header-stuck' );
			} else {
				$body.css( 'margin-top', 0 ).removeClass( 'hedaer-stuck' );
				$header.removeClass( 'fixed rolling minimized maximized' );
			}
		}

		lastScrollTop = currScrollTop;
	}

	/**
	 * Remove all the adjustments if resized to smaller screen.
	 */
	function resetHeader() {
		if ( 768 > $( window ).width() ) {
			$header.removeClass( 'fixed rolling minimized maximized' );
			$body.css( 'margin-top', 0 ).removeClass( 'hedaer-stuck' );
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
