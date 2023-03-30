<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Oskar
 */

/**
 * Skip Link
 * Anchor is filterable, for example:

function my_skip_link_anchor() {
	return '#my-element-anchor';
}
add_filter('oskar_skip_link_anchor', 'my_skip_link_anchor');

 */
function oskar_skip_link() {
	?>
	<a class="skip-link screen-reader-text" href="<?php echo esc_url( apply_filters( 'oskar_skip_link_anchor', '#content' ) ); ?>"><?php esc_html_e( 'Skip to content', 'oskar' ); ?></a>
	<?php
}

/**
 * Adds custom classes to the array of body classes
 *
 * @param array $classes Classes for the body element
 * @return array
 */
function oskar_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_theme_mod( 'header_textcolor' ) === 'blank' ) {
		$classes[] = 'title-tagline-hidden';
	}

	if ( post_password_required() ) {
		$classes[] = 'post-password-required';
	}

	$sidebar_position = get_theme_mod( 'sidebar_position' );
	if ( $sidebar_position === 'left' ) {
		$classes[] = 'sidebar-left';
	}

	return $classes;
}
add_filter( 'body_class', 'oskar_body_classes' );


function oskar_primary_menu_sub_trigger( $args, $item ) {
	if ( 'primary' === $args->theme_location ) {
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$args->after = '<button class="sub-trigger"></button>';
		} else {
			$args->after = '';
		}
	}
	return $args;
}
add_filter( 'nav_menu_item_args', 'oskar_primary_menu_sub_trigger', 10, 2 );


function oskar_primary_menu_fallback() {
	echo '<ul id="primary-menu" class="demo-menu">';
	wp_list_pages( array( 'number' => 5, 'depth' => 1, 'sort_column' => 'post_title', 'title_li' => '' ) );
	echo '</ul>';
}


function oskar_custom_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	} else {
		return get_theme_mod( 'excerpt_length', 20 );
	}
}
add_filter( 'excerpt_length', 'oskar_custom_excerpt_length', 999 );


function oskar_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'oskar_excerpt_more' );


function oskar_archive_title_prefix( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="author vcard">' . get_avatar( get_the_author_meta( 'ID' ), '80' ) . esc_html( get_the_author() ) . '</span>' ;
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'oskar_archive_title_prefix' );


function oskar_header_menu() {
	?>
	
	<div id="site-navigation" role="navigation">
		<button class="toggle-nav-open"></button>
		<div class="site-main-menu">
		<?php wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_id'		=> 'primary-menu',
				'fallback_cb'	=> 'oskar_primary_menu_fallback',
			)
		); ?>
		</div>
		<button class="menu-close"><?php esc_html_e( 'Close Menu', 'oskar' ); ?></button>
	</div>
	<?php
}


function oskar_header_content() {
	?>
		<div id="site-branding">
			<?php if ( get_theme_mod( 'custom_logo' ) ) {
					the_custom_logo();
				} else { ?>
				<?php if ( is_front_page() ) { ?>
					<h1 class="site-title"><a class="<?php echo esc_attr( get_theme_mod( 'site_title_style' ) );?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } else { ?>
					<p class="site-title"><a class="<?php echo esc_attr( get_theme_mod( 'site_title_style' ) );?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php } 
				} ?>				
					<div class="site-description"><?php bloginfo( 'description' ); ?></div>
		</div><!-- #site-branding -->
	<?php
}


function oskar_header_content_extra() {
	?>
		<div id="site-top-right">
			<button class="toggle-nav"></button>
			<?php oskar_header_search() ?>
			<?php oskar_header_account(); ?>
			<?php oskar_header_wishlist(); ?>
			<?php oskar_header_cart(); ?>
		</div><!-- #site-top-right -->
	<?php
}


/**
 * Return translated post ID
 */
function oskar_wpml_page_id( $id ) {
	if ( function_exists( 'wpml_object_id' ) ) {
		return apply_filters( 'wpml_object_id', $id, 'page' );
	} elseif ( function_exists( 'icl_object_id' ) ) {
		return icl_object_id( $id, 'page', true );
	} else {
		return $id;
	}
}


/**
 * Return current page
 */
function oskar_current_page_url() {
	global $wp;
	if ( !$wp->did_permalink ) {
		$oskar_current_page_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
	} else {
		$oskar_current_page_url = home_url( add_query_arg( array(), $wp->request ) );
	}
	if ( is_404( $oskar_current_page_url ) ) {
		$oskar_current_page_url  = home_url( '/' );
	}
	return esc_url( $oskar_current_page_url );
}


function oskar_header_search() {
	if ( !get_theme_mod( 'header_search_off' ) ) {
	?>
	<div class="top-search">
		<a href="#" class="icons oskar-icon-search"></a>
		<div class="mini-search">
		<?php if ( class_exists( 'WooCommerce' ) ) {
			get_product_search_form();
		} else {
			get_search_form();
		} ?>
		</div>
	</div>
<?php }
}


/**
 * Powered by WordPress & theme link/name
 * Theme link/name is filterable, for example:

function my_footer_text() {
	return 'My custom footer text here.';
}
add_filter('oskar_footer_info', 'my_footer_text');

 */
function oskar_powered_by() {
	$theme = wp_get_theme( 'oskar' );
	?>
			<div class="site-info">
				<?php
				/* translators: %s = link to wordpress.org */
				$powered_by = sprintf( esc_html__( 'Powered by %s', 'oskar' ), '<a href="https://wordpress.org/">WordPress</a>' );

				/* translators: %1$s = link to theme page, %2$s = theme author */
				$theme_info = sprintf( esc_html__( 'Theme: %1$s by %2$s', 'oskar' ), '<a href="' . esc_url( $theme->get( 'ThemeURI' ) ) . '">' . esc_html( $theme->get( 'Name' ) ) . '</a>', esc_html( $theme->get( 'Author' ) ) );

				$separator = '<span class="separator"> | </span>';

				echo apply_filters( 'oskar_footer_info', $powered_by . $separator . $theme_info );
				?>
			</div>
	<?php
}


/**
 * Output the homepage sections
 */
function oskar_homepage_sections() {

	$home_sections = get_theme_mod( 'home_sections' );

	if ( !$home_sections ) {
		$home_sections['options'] = 'services:1,page-content:1,extra-page-content:0,wc-categories:0,wc-recent:0,wc-featured:0,wc-sale:0,wc-best:0,wc-rated:0';
	}

	echo '<div id="homepage-sections">';

	$sections = explode( ',', $home_sections['options'] );

	foreach ( $sections as $section ) {

		$section = explode(":", $section);

		if ( $section[0] === 'services' && $section[1] === '1' ) {
			echo '<div id="section-services" class="section services">';
				oskar_homepage_features();
			echo '</div>';
		} elseif ( $section[0] === 'page-content' && $section[1] === '1' ) {
			echo '<div id="section-page-content" class="section page-content">';
				oskar_homepage_content();
			echo '</div>';
		} elseif ( $section[0] === 'extra-page-content' && $section[1] === '1' ) {
			echo '<div id="section-extra-page-content" class="section extra-page-content">';
				oskar_extra_page_content();
			echo '</div>';
		}

		if ( class_exists( 'WooCommerce' ) ) {

			$woo_column_option = esc_attr( get_option( 'woocommerce_catalog_columns', 4 ) );

			if ( $section[0] === 'wc-categories' && $section[1] === '1' ) {
				echo '<div id="section-wc-categories" class="section wc-categories">';
					echo '<h2 class="section-title">' . esc_html__( 'Product Categories', 'oskar' ) . '</h2>';
					echo do_shortcode('[product_categories number="0" parent="0" columns="' . $woo_column_option . '"]');
				echo '</div>';
			} elseif ( $section[0] === 'wc-recent' && $section[1] === '1' ) {
				echo '<div id="section-wc-recent" class="section wc-recent">';
					echo '<h2 class="section-title">' . esc_html__( 'New Products', 'oskar' ) . '</h2>';
					echo do_shortcode('[recent_products limit="' . $woo_column_option . '" columns="' . $woo_column_option . '"]');
				echo '</div>';
			} elseif ( $section[0] === 'wc-featured' && $section[1] === '1' ) {
				echo '<div id="section-wc-featured" class="section wc-featured">';
					echo '<h2 class="section-title">' . esc_html__( 'Featured Products', 'oskar' ) . '</h2>';
					echo do_shortcode('[featured_products limit="' . $woo_column_option . '" columns="' . $woo_column_option . '"]');
				echo '</div>';
			} elseif ( $section[0] === 'wc-sale' && $section[1] === '1' ) {
				echo '<div id="section-wc-sale" class="section wc-sale">';
					echo '<h2 class="section-title">' . esc_html__( 'On-sale Products', 'oskar' ) . '</h2>';
					echo do_shortcode('[sale_products limit="' . $woo_column_option . '" columns="' . $woo_column_option . '"]');
				echo '</div>';
			} elseif ( $section[0] === 'wc-best' && $section[1] === '1' ) {
				echo '<div id="section-wc-best" class="section wc-best">';
					echo '<h2 class="section-title">' . esc_html__( 'Top Selling Products', 'oskar' ) . '</h2>';
					echo do_shortcode('[best_selling_products limit="' . $woo_column_option . '" columns="' . $woo_column_option . '"]');
				echo '</div>';
			} elseif ( $section[0] === 'wc-rated' && $section[1] === '1' ) {
				echo '<div id="section-wc-rated" class="section wc-rated">';
					echo '<h2 class="section-title">' . esc_html__( 'Top Rated Products', 'oskar' ) . '</h2>';
					echo do_shortcode('[top_rated_products limit="' . $woo_column_option . '" columns="' . $woo_column_option . '"]');
				echo '</div>';
			}

		}

	}

	echo '</div>';

}


function oskar_extra_page_content() {
	$extra_page_id = get_theme_mod( 'homepage_extra_page' );
	if ( $extra_page_id ) { ?>
		<article id="post-<?php echo $extra_page_id; ?>" <?php post_class( '', $extra_page_id); ?>>
			<div class="entry-content single-entry-content">
			<?php
				echo apply_filters( 'the_content', get_the_content( '', '', $extra_page_id ) );
			?>
			</div><!-- .entry-content -->
		</article><!-- #post-<?php echo $extra_page_id; ?> -->
	<?php }
}


/*
 * Return (maximum) number of homepage featured services.
 * Default = 4
 * Filterable, for example:

function my_featured_services_number() {
	return 6;
}
add_filter('oskar_featured_services_number', 'my_featured_services_number');

 */
function oskar_featured_services_number() {
	return apply_filters( 'oskar_featured_services_number', '4' );
}


function oskar_homepage_features() {
	$featured_style = get_theme_mod( 'featured_style', '1' );
	$featured_zoom = get_theme_mod( 'featured_zoom', false );
	if ( $featured_zoom ) {
		$featured_zoom_class = ' has-zoom';
	} else {
		$featured_zoom_class = '';
	}
	?>
	<section id="featured-post-section" class="section">
		<div class="featured-post-wrap is-style-<?php echo esc_attr( $featured_style ) . esc_attr( $featured_zoom_class ) ;?>">
			<?php
			if ( is_customize_preview() ) {
			 	# latest posts
				oskar_homepage_featured_posts( true );
				# selected pages
				oskar_homepage_featured_pages( true );
			} else {
				$featured_pages = get_theme_mod( 'featured_pages' );
				if ( !$featured_pages ) {
				 	# latest posts
					oskar_homepage_featured_posts();
				} else {
					# selected pages
					oskar_homepage_featured_pages();
				}
			}
			?>
		</div>
	</section>
	<?php
}


function oskar_homepage_featured_posts( $is_customizer = false ) {
	$display_none = '';
	$featured_pages = get_theme_mod( 'featured_pages' );
	if ( $is_customizer && $featured_pages ) {
		$display_none = ' style="display:none;"';
	}

	$enable_featured_link = get_theme_mod( 'enable_featured_link', true );

	$oskar_recent_args = array(
		'numberposts' => oskar_featured_services_number(),
		'orderby' => 'post_date',
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' => 'publish',
		'suppress_filters' => false
		);
	$recent_posts = wp_get_recent_posts( $oskar_recent_args );
	$featured_post_number = 1;
	foreach( $recent_posts as $recent ){
		$featured_page_icon = get_theme_mod( 'featured_page_icon'.$featured_post_number, oskar_featured_icon_defaults($featured_post_number) );
		?>
		<div class="featured-post featured-post<?php echo $featured_post_number; ?> is-post"<?php echo $display_none; ?>>
			<a href="<?php echo esc_url( get_permalink( $recent["ID"] ) ); ?>" class="featured-link"><span class="featured-icon"><i class="<?php echo esc_attr( $featured_page_icon ); ?>"></i></span>
			<h4><?php echo wp_kses_post( get_the_title($recent["ID"]) ); ?></h4></a>
			<div class="featured-excerpt">
			<?php
			$featured_page_excerpt = wp_kses_post( wpautop( get_post_field( 'post_excerpt', $recent["ID"] ) ) );
			if ( $featured_page_excerpt === '' ) {
				$featured_page_excerpt = wpautop( wp_trim_words( strip_shortcodes( get_post_field( 'post_content', $recent["ID"] ) ), get_theme_mod('excerpt_length',20) ) );
			}
			if ( $featured_page_excerpt !== '' ) {
				echo $featured_page_excerpt;
			}

			?>
			</div>
			<?php
			if ( $enable_featured_link ) {
			?>
				<div class="featured-button">
					<a href="<?php echo esc_url( get_permalink( $recent["ID"] ) ); ?>" class="button featured-readmore"><?php echo esc_html__( 'Read More', 'oskar' );?></a>
				</div>
			<?php
			}
			?>
		</div>
		<?php
		$featured_post_number++;
	}
	wp_reset_postdata();
}


function oskar_homepage_featured_pages( $is_customizer = false ) {
	$is_content = '';
	$display_none = '';
	$featured_pages = get_theme_mod( 'featured_pages' );
	if ( $is_customizer ) {
		$is_content = ' is-content';
		if ( !$featured_pages ) {
			$display_none = ' style="display:none;"';
		}
	}

	$enable_featured_link = get_theme_mod( 'enable_featured_link', true );

	for ( $i = 1; $i <= oskar_featured_services_number(); $i++ ) {
		$featured_page_icon = get_theme_mod( 'featured_page_icon'.$i, oskar_featured_icon_defaults($i) );
		$featured_page_link = oskar_wpml_page_id( get_theme_mod( 'featured_page_link'.$i) );					
		if ( $featured_page_link ) {
		?>
		<div class="featured-post featured-post<?php echo $i ;?> is-page<?php echo $is_content; ?>"<?php echo $display_none; ?>>
			<a href="<?php echo esc_url( get_page_link( $featured_page_link ) ); ?>" class="featured-link"><span class="featured-icon"><i class="<?php echo esc_attr( $featured_page_icon ); ?>"></i></span>
			<h4><?php echo wp_kses_post( get_the_title($featured_page_link) ); ?></h4></a>
			<div class="featured-excerpt">
			<?php
			$featured_page_excerpt = wp_kses_post( wpautop( get_post_field( 'post_excerpt', $featured_page_link ) ) );
			if ( $featured_page_excerpt === '' ) {
				$featured_page_excerpt = wpautop( wp_trim_words( strip_shortcodes( get_post_field( 'post_content', $featured_page_link ) ), get_theme_mod('excerpt_length',20) ) );
			}
			if ( $featured_page_excerpt !== '' ) {
				echo $featured_page_excerpt;
			}
			?>
			</div>
			<?php
			if ( $enable_featured_link ) {
			?>
				<div class="featured-button">
				<a href="<?php echo esc_url( get_page_link( $featured_page_link ) ); ?>" class="button featured-readmore"><?php echo esc_html__( 'Read More', 'oskar' );?></a>
				</div>
			<?php
			}
			?>						
		</div>
	<?php
		} else {
			if ( $is_customizer ) {
				?>
				<div class="featured-post featured-post<?php echo $i ;?> is-page is-empty" style="display:none;">
					<a href="#" class="featured-link"><span class="featured-icon"><i class="<?php echo esc_attr( $featured_page_icon ); ?>"></i></span>
					<h4></h4></a>
					<div class="featured-excerpt">
					</div>
					<div class="featured-button">
						<a href="#" class="button featured-readmore"><?php echo esc_html__( 'Read More', 'oskar' );?></a>
					</div>
				</div>
				<?php
			}
		}
	}
}


function oskar_featured_icon_defaults( $input ) {
	if ( $input === 1 ) {
		$output = 'fa-solid fa-mobile-screen-button';
	} elseif ( $input === 2 ) {
		$output = 'fa-solid fa-laptop';
	} elseif ( $input === 3 ) {
		$output = 'fa-solid fa-users';
	} elseif ( $input === 4 ) {
		$output = 'fa-solid fa-video';
	} else {
		$output = 'fa-solid fa-check';
	}
	return $output;
}


function oskar_homepage_content() {
	while ( have_posts() ) : the_post();
		get_template_part( 'content', 'front-page' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
	endwhile; // End of the loop.
}


function oskar_breakpoint( $device = '' ) {
	if ( $device === 'small' ) {
		$width = get_theme_mod( 'breakpoint_small', '480' );
		$unit = get_theme_mod( 'breakpoint_small_unit', 'px' );
	} elseif ( $device === 'mobile' ) {
		$width = get_theme_mod( 'breakpoint_mobile', '768' );
		$unit = get_theme_mod( 'breakpoint_mobile_unit', 'px' );
	} else {
		$width = get_theme_mod( 'breakpoint_tablet', '1024' );
		$unit = get_theme_mod( 'breakpoint_tablet_unit', 'px' );
	}
	$media = '(max-width: ' . esc_attr( $width ) . esc_attr( $unit ) . ')';
	return $media;
}


/**
 * Exclude images with 'no-lazy-load' CSS class from Jetpack lazy load
 */
function oskar_exclude_class_from_lazy_load( $classes ) {
	$classes[] = 'no-lazy-load';
	return $classes;
}
add_filter( 'jetpack_lazy_images_blacklisted_classes', 'oskar_exclude_class_from_lazy_load', 999, 1 );
