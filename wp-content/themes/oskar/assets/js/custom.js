/**
 * Oskar Custom JS
 *
 * @package Oskar
 *
 */
jQuery(document).ready(function($){
	// Defining a function to position fixed header below admin bar if admin bar is present.
	function fullscreen(){

		if ( $('#wpadminbar').length ) {
			var adminbarheight = parseInt( $('#wpadminbar').outerHeight() );
			$('#masthead').css({'top': adminbarheight + 'px'});
		}

		if ( ! $('#primary-menu').length ) {
			$('.toggle-nav').css({'display': 'none'});
		}

	}
  
	fullscreen();

	// Run the function in case of window resize
	jQuery(window).resize(function() {
		fullscreen();		 
	});

});

jQuery(function($){

	$( 'a.skip-link' ).click( function() {
		$('#masthead').css({'opacity': '0'});
		$('#content').addClass('is-focused');
	});

	if ( window.location.hash === '#content' ) {
		$('#masthead').css({'opacity': '0'});
		$('#content').addClass('is-focused');
	}

	function navScroll(){
		var masthead = parseInt( $('#masthead').height() );

		if ( masthead ) {
			var s = $("#masthead");
			var pos = s.position();
		} else {
			pos = 0;
		}

		var windowpos = $(window).scrollTop();
		
		if ( $('#home-hero-section').length ) {
			var contentElement = '#hero-above-wrapper';
		} else {
			var contentElement = '.site-content';
		}

		if (windowpos > pos.top) {
			$('#masthead').addClass('scrolled');
			if ( $('#masthead.not-full').length ) {
				$(contentElement).css({'padding-top': masthead + 'px'});
			}
		} else {
			$('#masthead').css({'opacity': '1'});
			$('#masthead').removeClass('scrolled');
			if ( $('#masthead.not-full').length ) {
				$(contentElement).css({'padding-top': '0'});
			}
		}
	}

	$(window).scroll(function() {
		navScroll();
	});
	$(document).ready(function() {
		navScroll();
	});

	var count_hero_images = $('#home-hero-section .widget_media_image').length;
	var count_hero_block_widgets = $('#home-hero-section .widget_block').length;
	var total_hero_count = count_hero_images + count_hero_block_widgets;

	if ( total_hero_count > 1 ) {
		$('#home-hero-section').addClass('bx-slider');
	}

	$('.bx-slider').bxSlider({
		'pager': true,
		'auto' : true,
		'mode' : 'fade',
		'pause' : 7000,
		'controls' : false,
		'adaptiveHeight' : true,
	});

	$('#home-hero-section .widget_media_image').each(function(){
		var MediaWidgetTitle = $('.hero-widget-title', this).html();
		var MediaWidgetHref = $('a', this).attr('href');
		if ( MediaWidgetHref ) {
			$('.hero-widget-title', this).html('<a href="' + MediaWidgetHref + '">' + MediaWidgetTitle + '</a>');
		}
	});

	if ( $('#home-hero-section').length ) {
		var siteContentHeight = parseInt( $('.site-content').height() );
		if ( siteContentHeight < 1 ) {
			$('.site-content').css({'margin-top': '0'});
		}
	}

	// WooCommerce quantity buttons
	jQuery('div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)').addClass('buttons_added').append('<input type="button" value="+" class="plus" />').prepend('<input type="button" value="-" class="minus" />');

	// Target quantity inputs on product pages
	jQuery('input.qty:not(.product-quantity input.qty)').each( function() {
		var min = parseFloat( jQuery( this ).attr('min') );

		if ( min && min > 0 && parseFloat( jQuery( this ).val() ) < min ) {
			jQuery( this ).val( min );
		}
	});

	jQuery( document ).on('click', '.plus, .minus', function() {

		// Get values
		var $qty		= jQuery( this ).closest('.quantity').find('.qty'),
			currentVal  = parseFloat( $qty.val() ),
			max		 = parseFloat( $qty.attr('max') ),
			min		 = parseFloat( $qty.attr('min') ),
			step		= $qty.attr('step');

		// Format values
		if ( ! currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
		if ( max === '' || max === 'NaN') max = '';
		if ( min === '' || min === 'NaN') min = 0;
		if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN') step = 1;

		// Change the value
		if ( jQuery( this ).is('.plus') ) {

			if ( max && ( max == currentVal || currentVal > max ) ) {
				$qty.val( max );
			} else {
				$qty.val( currentVal + parseFloat( step ) );
			}

		} else {

			if ( min && ( min == currentVal || currentVal < min ) ) {
				$qty.val( min );
			} else if ( currentVal > 0 ) {
				$qty.val( currentVal - parseFloat( step ) );
			}

		}

		// Trigger change event
		$qty.trigger('change');
	});

	if ( $('.mini-account p.username-wrap').length ) {
		$('.mini-account p.username-wrap').html($('.mini-account p.username-wrap').html().replace('(','<br>('));
	}

	$( '.top-search .oskar-icon-search' ).on( 'click', function(e) {
		$( '.top-search' ).toggleClass( 'search-open' );
	});

	$( '.top-search .mini-search' ).on( 'keydown', function (e) {
		var isTabbed = ( e.key === 'Tab' || e.keyCode === 9 );
		if ( !isTabbed ) {
			return;
		}
		if ( e.shiftKey ) {
			return;
		} else {
			$( '.top-search .oskar-icon-search' ).focus();
			e.preventDefault();
		}
	});

	$( '.toggle-nav' ).click( function() {
		$( this ).toggleClass( 'menu-open' );
		$( '#site-navigation' ).toggleClass( 'menu-open' );
		$( '.toggle-nav-open' ).focus();
	});

	$( '.toggle-nav-open,.menu-close' ).click( function() {
		$( '.toggle-nav' ).toggleClass( 'menu-open' );
		$( '#site-navigation' ).toggleClass( 'menu-open' );
		$( '.toggle-nav' ).focus();
	});

	$( '.menu-close' ).on( 'keydown', function (e) {
		var isTabbed = ( e.key === 'Tab' || e.keyCode === 9 );
		if ( !isTabbed ) {
			return;
		}
		if ( e.shiftKey ) {
			return;
		} else {
			$( '.toggle-nav-open' ).focus();
			e.preventDefault();
		}
	});

	$( '.sub-trigger' ).click( function() {
		$( this ).toggleClass( 'is-open' );
		$( this ).siblings( '.sub-menu' ).toggle();
	});

	$( '.top-account .mini-account input' ).focusin( function() {
		$( '.top-account .mini-account' ).addClass( 'locked' );
	}).add( '.top-account .mini-account' ).focusout( function() {
		if ( !$( '.top-account .mini-account' ).is( ':focus' ) ) {
			$( '.top-account .mini-account' ).removeClass( 'locked' );
		}
	});

	$( '#primary-menu li.menu-item-has-children' ).focusin( function() {
		$( this ).addClass( 'locked' );
	}).add( this ).focusout( function() {
		if ( !$( this ).is( ':focus' ) ) {
			$( this ).removeClass( 'locked' );
		}
	});

	$( '.top-account #customer_login .u-column2 h2' ).click( function() {
		$( '.top-account #customer_login .u-column2' ).toggleClass( 'open' );
	});

});

jQuery( document ).ready( function( $ ){
	$(document).on( 'added_to_wishlist removed_from_wishlist', function(){
		var counter = $('.wishlist_products_counter_number');

		$.ajax({
			url: yith_wcwl_l10n.ajax_url,
			data: {
				action: 'yith_wcwl_update_wishlist_count'
			},
			dataType: 'json',
			success: function( data ){
				counter.html( data.count );
			}
		})
	} )
});
