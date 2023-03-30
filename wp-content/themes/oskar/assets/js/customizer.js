/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
( function( $ ) {

	wp.customize('blogname', function( value ) {
		value.bind( function( to ) {
			$('.site-title a').text( to );
		} );
	} );

	wp.customize('blogdescription', function( value ) {
		value.bind( function( to ) {
			$('.site-description').text( to );
		} );
	} );

	wp.customize('header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( 'body' ).addClass( 'title-tagline-hidden' );
			} else {
				$( 'body' ).removeClass( 'title-tagline-hidden' );
				$('body').css('--header--text--color', to);
			}
		} );
	} );

	wp.customize('container_width', function( value ) {
		value.bind( function( to ) {
			var unit = wp.customize( 'container_width_unit' ).get();
			$('body').css('--container--width', to + unit);
		} );
	} );
	wp.customize('container_width_unit', function( value ) {
		value.bind( function( to ) {
			var width = wp.customize( 'container_width' ).get();
			$('body').css('--container--width', width + to);
		} );
	} );

	wp.customize('site_spacing', function( value ) {
		value.bind( function( to ) {
			var unit = wp.customize( 'site_spacing_unit' ).get();
			$('body').css('--site--spacing', to + unit);
		} );
	} );
	wp.customize('site_spacing_unit', function( value ) {
		value.bind( function( to ) {
			var spacing = wp.customize( 'site_spacing' ).get();
			$('body').css('--site--spacing', spacing + to);
		} );
	} );

	wp.customize('breakpoint_tablet', function( value ) {
		value.bind( function( to ) {
			var unit = wp.customize( 'breakpoint_tablet_unit' ).get();
			$('head #oskar-style-tablet-css').attr('media', '(max-width: ' + to + unit + ')');
		} );
	} );
	wp.customize('breakpoint_tablet_unit', function( value ) {
		value.bind( function( to ) {
			var width = wp.customize( 'breakpoint_tablet' ).get();
			$('head #oskar-style-tablet-css').attr('media', '(max-width: ' + width + to + ')');
		} );
	} );

	wp.customize('breakpoint_mobile', function( value ) {
		value.bind( function( to ) {
			var unit = wp.customize( 'breakpoint_mobile_unit' ).get();
			$('head #oskar-style-mobile-css, head #oskar-wc-style-mobile-css').attr('media', '(max-width: ' + to + unit + ')');
		} );
	} );
	wp.customize('breakpoint_mobile_unit', function( value ) {
		value.bind( function( to ) {
			var width = wp.customize( 'breakpoint_mobile' ).get();
			$('head #oskar-style-mobile-css, head #oskar-wc-style-mobile-css').attr('media', '(max-width: ' + width + to + ')');
		} );
	} );

	wp.customize('breakpoint_small', function( value ) {
		value.bind( function( to ) {
			var unit = wp.customize( 'breakpoint_small_unit' ).get();
			$('head #oskar-style-small-css, head #oskar-wc-style-small-css').attr('media', '(max-width: ' + to + unit + ')');
		} );
	} );
	wp.customize('breakpoint_small_unit', function( value ) {
		value.bind( function( to ) {
			var width = wp.customize( 'breakpoint_small' ).get();
			$('head #oskar-style-small-css, head #oskar-wc-style-small-css').attr('media', '(max-width: ' + width + to + ')');
		} );
	} );

	wp.customize('grid_layout', function( value ) {
		value.bind( function( to ) {
			$( '#grid-loop' ).removeClass();
			$( '#grid-loop' ).addClass( 'layout-' + to );
		} );
	} );

	wp.customize('background_color', function( value ) {
		value.bind( function( to ) {
			$('body').css( {
				'--wp--preset--color--bg': to,
				'--wp--preset--color--bg-dark': oskar_color_variation( to, 0.3 ),
				'--wp--preset--color--bg-light': oskar_color_variation( to, 0.4, true ),
				'--wp--preset--color--bg-very-light': oskar_color_variation( to, 0.1, true )
			} );
		} );
	} );

	wp.customize('font_site_title', function( value ) {
		value.bind( function( to ) {
			oskar_font_bind( to, 'site-title' );
		} );
	} );

	wp.customize('font_nav', function( value ) {
		value.bind( function( to ) {
			oskar_font_bind( to, 'nav' );
		} );
	} );

	wp.customize('font_content', function( value ) {
		value.bind( function( to ) {
			oskar_font_bind( to, 'content' );
		} );
	} );

	wp.customize('font_headings', function( value ) {
		value.bind( function( to ) {
			oskar_font_bind( to, 'headings' );
		} );
	} );

	wp.customize('font_size_small_min', function( value ) {
		value.bind( function( to ) {
			var max = wp.customize.value( 'font_size_small_max' ).get();
			var size_attr = oskar_get_font_size( to, max );
			$('body').css({'--wp--preset--font-size--small': size_attr});
		} );
	} );
	wp.customize('font_size_small_max', function( value ) {
		value.bind( function( to ) {
			var min = wp.customize.value( 'font_size_small_min' ).get();
			var size_attr = oskar_get_font_size( min, to );
			$('body').css({'--wp--preset--font-size--small': size_attr});
		} );
	} );

	wp.customize('font_size_normal_min', function( value ) {
		value.bind( function( to ) {
			var max = wp.customize.value( 'font_size_normal_max' ).get();
			var size_attr = oskar_get_font_size( to, max );
			$('body').css({'--wp--preset--font-size--normal': size_attr});
		} );
	} );
	wp.customize('font_size_normal_max', function( value ) {
		value.bind( function( to ) {
			var min = wp.customize.value( 'font_size_normal_min' ).get();
			var size_attr = oskar_get_font_size( min, to );
			$('body').css({'--wp--preset--font-size--normal': size_attr});
		} );
	} );

	wp.customize('font_size_medium_min', function( value ) {
		value.bind( function( to ) {
			var max = wp.customize.value( 'font_size_medium_max' ).get();
			var size_attr = oskar_get_font_size( to, max );
			$('body').css({'--wp--preset--font-size--medium': size_attr});
		} );
	} );
	wp.customize('font_size_medium_max', function( value ) {
		value.bind( function( to ) {
			var min = wp.customize.value( 'font_size_medium_min' ).get();
			var size_attr = oskar_get_font_size( min, to );
			$('body').css({'--wp--preset--font-size--medium': size_attr});
		} );
	} );

	wp.customize('font_size_large_min', function( value ) {
		value.bind( function( to ) {
			var max = wp.customize.value( 'font_size_large_max' ).get();
			var size_attr = oskar_get_font_size( to, max );
			$('body').css({'--wp--preset--font-size--large': size_attr});
		} );
	} );
	wp.customize('font_size_large_max', function( value ) {
		value.bind( function( to ) {
			var min = wp.customize.value( 'font_size_large_min' ).get();
			var size_attr = oskar_get_font_size( min, to );
			$('body').css({'--wp--preset--font-size--large': size_attr});
		} );
	} );

	wp.customize('font_size_x-large_min', function( value ) {
		value.bind( function( to ) {
			var max = wp.customize.value( 'font_size_x-large_max' ).get();
			var size_attr = oskar_get_font_size( to, max );
			$('body').css({'--wp--preset--font-size--x-large': size_attr});
		} );
	} );
	wp.customize('font_size_x-large_max', function( value ) {
		value.bind( function( to ) {
			var min = wp.customize.value( 'font_size_x-large_min' ).get();
			var size_attr = oskar_get_font_size( min, to );
			$('body').css({'--wp--preset--font-size--x-large': size_attr});
		} );
	} );

	wp.customize('font_size_xx-large_min', function( value ) {
		value.bind( function( to ) {
			var max = wp.customize.value( 'font_size_xx-large_max' ).get();
			var size_attr = oskar_get_font_size( to, max );
			$('body').css({'--wp--preset--font-size--xx-large': size_attr});
		} );
	} );
	wp.customize('font_size_xx-large_max', function( value ) {
		value.bind( function( to ) {
			var min = wp.customize.value( 'font_size_xx-large_min' ).get();
			var size_attr = oskar_get_font_size( min, to );
			$('body').css({'--wp--preset--font-size--xx-large': size_attr});
		} );
	} );

	wp.customize('featured_style', function( value ) {
		value.bind( function( to ) {
			$('.featured-post-wrap').removeClass( 'is-style-1 is-style-2 is-style-3' ).addClass( 'is-style-' + to );
		} );
	} );

	wp.customize('featured_zoom', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$('.featured-post-wrap').addClass( 'has-zoom' );
			} else {
				$('.featured-post-wrap').removeClass( 'has-zoom' );
			}
		} );
	} );

	wp.customize('featured_overlap', function( value ) {
		value.bind( function( to ) {
			$('body').css( {'--featured--services--overlap': to + 'px'} );
		} );
	} );

	for ( let i_feature = 0; i_feature <= oskar_featured_services['number']; i_feature++ ) {
		wp.customize('featured_page_icon' + i_feature, function( value ) {
			value.bind( function( to ) {
				$('.featured-post' + i_feature + ' .featured-icon i').removeClass().addClass(to);
			} );
		} );
		wp.customize('featured_page_link' + i_feature, function( value ) {
			value.bind( function( to ) {
				if ( to == 0 ) {
					$('.featured-post' + i_feature + '.is-page').css('display', 'none');
				} else {
					$('.featured-post' + i_feature + '.is-page').removeClass('is-empty').addClass('is-content');
					$('.featured-post' + i_feature + '.is-page').css('display', 'flex');
					$('.featured-post' + i_feature + '.is-page h4').text( oskar_published_pages[to].title );
					$('.featured-post' + i_feature + '.is-page .featured-excerpt').html( oskar_published_pages[to].excerpt );
					$('.featured-post' + i_feature + '.is-page .featured-link, .featured-post1 .featured-readmore').attr('href', oskar_published_pages[to].link );
				}
			} );
		} );
	}

	wp.customize('featured_pages', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$('.featured-post.is-post').css('display', 'none');
				$('.featured-post.is-page.is-content').css('display', 'flex');
			} else {
				$('.featured-post.is-post').css('display', 'flex');
				$('.featured-post.is-page').css('display', 'none');
			}
		} );
	} );

	$.each(oskar_preview_attrs, function(option, attr) {
		wp.customize(option, function( value ) {
			value.bind( function( to ) {
				if ( attr.colorvariations ) {
					$(attr.selector).css(attr.property, to);
					$(attr.selector).css(attr.property + '-dark', oskar_color_variation( to, 0.3 ));
					$(attr.selector).css(attr.property + '-light', oskar_color_variation( to, 0.4, true ));
					$(attr.selector).css(attr.property + '-very-light', oskar_color_variation( to, 0.1, true ));
				} else {
					if ( to === '' ) {
						$(attr.selector).css(attr.property, attr.fallback);
					} else {
						$(attr.selector).css(attr.property, attr.prepend + to + attr.append);
					}
				}
			} );
		} );
	});

} )( jQuery );

function oskar_get_font_size( min, max ) {
	if ( min === max ) {
		var size_attr = min + 'px';
	} else {
		var linear_factor = oskar_font_linear_value( min, max );
		var size_attr = 'clamp(' + min + 'px, ' + min + 'px + ((1vw - 7.68px) * ' + linear_factor + '), ' + max + 'px)';
	}
	return size_attr;
}

function oskar_font_linear_value( min, max ) {
	var linear_factor = 100 * ( ( max - min ) / 832 );
	return oskar_round_to( linear_factor, 3 );
}

function oskar_round_to( value ) {
	let digits = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 3;
	const base = Math.pow(10, digits);
	return Number.isFinite(value) ? parseFloat(Math.round(value * base) / base) : undefined;
}

function oskar_font_bind( to, style_var ) {
	to = to.replace(/\|/gi, ";");
	if ( to != '' ) {
		jQuery('head').append('<link href="//fonts.googleapis.com/css2?family=' + to + '" type="text/css" media="all" rel="stylesheet">');
		to = to.substr(0, to.indexOf(':'));
		to = to.replace(/\+/gi, " ");
		jQuery('body').css( '--font--family--' + style_var, '"' + to + '"' );
	}
}

function oskar_color_variation( hex, percent, lighter = false ) {
	var r,g,b;
	if ( hex.charAt(0) == '#') {
		hex = hex.substr(1);
	}

	r = hex.charAt(0) + '' + hex.charAt(1);
	g = hex.charAt(2) + '' + hex.charAt(3);
	b = hex.charAt(4) + '' + hex.charAt(5);

	r = parseInt( r, 16 );
	g = parseInt( g, 16 );
	b = parseInt( b, 16 );

	if ( lighter == true ) {
		r = Math.round( r * percent ) + Math.round( 255 * ( 1 - percent ) );
		g = Math.round( g * percent ) + Math.round( 255 * ( 1 - percent ) );
		b = Math.round( b * percent ) + Math.round( 255 * ( 1 - percent ) );
	} else {
		r = Math.round( r * ( 1 - percent ) );
		g = Math.round( g * ( 1 - percent ) );
		b = Math.round( b * ( 1 - percent ) );
	}

	if ( r > 255 ) {
		r = 255;
	}
	if ( g > 255 ) {
		g = 255;
	}
	if ( b > 255 ) {
		b = 255;
	}
	
	return 'rgb(' + r + ',' + g + ',' + b + ')';
}
