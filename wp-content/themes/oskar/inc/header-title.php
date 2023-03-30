<?php

function oskar_header_title() {

	if ( get_theme_mod( 'page_title_style' ) == 2 || get_theme_mod( 'page_title_style' ) == 4 ) {
		return NULL;
	}

	if ( is_singular() ) {
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_product() ) {
				oskar_header_title_product();
			} else {
				oskar_header_title_singular();
			}
		} else {
			oskar_header_title_singular();
		}			
	}

	elseif ( is_archive() ) {
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_shop() ) {
				oskar_header_title_shop();
			} elseif ( is_product_category() || is_product_tag() ) {
				oskar_header_title_archive_wc();
			} else {
				oskar_header_title_archive();
			}
		} else {
			oskar_header_title_archive();
		}
	}

	elseif ( is_home() && 'page' == get_option( 'show_on_front' ) ) {
		oskar_header_title_home();
	}

	elseif ( is_search() ) {
		oskar_header_title_search();
	}

	elseif ( is_404() ) {
		oskar_header_title_404();
	}

	else {
		oskar_header_title_fallback();
	}

}


function oskar_header_title_singular() {

	if ( 'post' === get_post_type() ) {
		$theme_mod = 'header_img_post';
	} elseif ( 'page' === get_post_type() ) {
		$theme_mod = 'header_img_page';
	} else {
		$theme_mod = '';
	}

	if ( $theme_mod !== '' ) {
		if ( get_theme_mod( $theme_mod ) === 'main' ) {
			$bg_image_url = get_header_image();
		} else {
			if ( has_post_thumbnail() ) {
				$bg_image_url = esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) );
			} else {
				$bg_image_url = get_header_image();
			}		
		}
	} else {
		$bg_image_url = get_header_image();
	}
	?>
	<header id="header-title" class="entry-header with-image full" style="background-image: url('<?php echo $bg_image_url; ?>')">
		<div class="title-meta-wrapper">
			<div class="container">
	<?php

	if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<?php oskar_entry_meta(); ?>
		</div><!-- .entry-meta -->
	<?php
	endif;

				the_title( '<h1 class="entry-title">', '</h1>' );
				oskar_single_excerpt();
	?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<?php
}


function oskar_header_title_home() {

	$blog_page_id = get_option( 'page_for_posts' );

	$bg_image_url = esc_url( get_the_post_thumbnail_url( $blog_page_id, 'full' ) );

	if ( !$bg_image_url ) {
		$bg_image_url = get_header_image();
	}

	$home_excerpt = wp_kses_post( wpautop( get_post_field( 'post_excerpt', $blog_page_id ) ) );

	?>
	<header id="header-title" class="archive-header with-image full" style="background-image: url('<?php echo $bg_image_url; ?>')">
		<div class="title-meta-wrapper">
			<div class="container">
				<h1 class="archive-title"><?php echo get_the_title( $blog_page_id ); ?></h1>
				<?php
				if ( $home_excerpt ) { ?>
					<div class="archive-description">
						<?php echo $home_excerpt; ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<?php
}


function oskar_header_title_archive() {

	$bg_image_url = get_header_image();
	?>
	<header id="header-title" class="archive-header with-image full" style="background-image: url('<?php echo $bg_image_url; ?>')">
		<div class="title-meta-wrapper">
			<div class="container">
				<?php
				if ( is_search() ) {
					echo '<h1 class="archive-title search">';
					/* translators: %s = the search query */
					printf( esc_html__( 'Search results for: %s', 'oskar' ), '<span class="search-query">' . get_search_query() . '</span>' );
					echo'</h1>';
				} else {
					the_archive_title( '<h1 class="archive-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				}					
				?>
			</div>
		</div>
	</header><!-- .archive-header -->

	<?php
}


function oskar_header_title_search() {

	$bg_image_url = get_header_image();
	?>
	<header id="header-title" class="archive-header with-image full" style="background-image: url('<?php echo $bg_image_url; ?>')">
		<div class="title-meta-wrapper">
			<div class="container">
				<?php
				echo '<h1 class="archive-title search">';
				/* translators: %s = the search query */
				printf( esc_html__( 'Search results for: %s', 'oskar' ), '<span class="search-query">' . get_search_query() . '</span>' );
				echo'</h1>';
				?>
			</div>
		</div>
	</header><!-- .archive-header -->

	<?php
}


function oskar_header_title_404() {

	$bg_image_url = get_header_image();
	?>
	<header id="header-title" class="archive-header with-image full" style="background-image: url('<?php echo $bg_image_url; ?>')">
		<div class="title-meta-wrapper">
			<div class="container">
				<?php
				echo '<h1 class="archive-title 404">' . esc_html__( '404 Error', 'oskar' ) . '</h1>';
				?>
			</div>
		</div>
	</header><!-- .archive-header -->

	<?php
}


function oskar_header_title_archive_wc() {

	add_filter( 'woocommerce_show_page_title', '__return_false' );

	remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
	remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

	add_action( 'oskar_woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
	add_action( 'oskar_woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

	if ( get_theme_mod( 'header_img_product_cat' ) === 'main' ) {
		$bg_image_url = get_header_image();
	} else {
		$bg_image_url = oskar_wc_archive_image_url();
		if ( !$bg_image_url ) {
			$bg_image_url = get_header_image();
		}
	}
	?>
	<header id="header-title" class="archive-header with-image full" style="background-image: url('<?php echo $bg_image_url; ?>')">
		<div class="title-meta-wrapper">
			<div class="container">
				<?php
				echo '<h1 class="archive-title">';
				woocommerce_page_title();
				echo '</h1>';
				do_action( 'oskar_woocommerce_archive_description' );
				?>
			</div>
		</div>
	</header><!-- .archive-header -->

	<?php
}


function oskar_wc_archive_image_url() {
	if ( is_product_category() ) {
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );
		return $image;
	} else {
		return NULL;
	}
}


function oskar_header_title_product() {

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

	if ( get_theme_mod( 'header_img_product' ) === 'main' ) {
		$bg_image_url = get_header_image();
	} else {
		if ( has_post_thumbnail() ) {
			$bg_image_url = esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) );
		} else {
			$bg_image_url = get_header_image();
		}			
	}
	?>
	<header id="header-title" class="entry-header with-image full" style="background-image: url('<?php echo $bg_image_url; ?>')">
		<div class="title-meta-wrapper">
			<div class="container">
	<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
	?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<?php
}


function oskar_header_title_shop() {

	add_filter( 'woocommerce_show_page_title', '__return_false' );

	$shop_page_id = wc_get_page_id( 'shop' );

	$bg_image_url = esc_url( get_the_post_thumbnail_url( $shop_page_id, 'full' ) );

	if ( !$bg_image_url ) {
		$bg_image_url = get_header_image();
	}

	$shop_excerpt = wp_kses_post( wpautop( get_post_field( 'post_excerpt', $shop_page_id ) ) );

	?>
	<header id="header-title" class="archive-header with-image full" style="background-image: url('<?php echo $bg_image_url; ?>')">
		<div class="title-meta-wrapper">
			<div class="container">
				<?php
				echo '<h1 class="archive-title">';
				woocommerce_page_title();
				echo '</h1>';
				if ( $shop_excerpt ) { ?>
					<div class="archive-description">
						<?php echo $shop_excerpt; ?>
					</div>
				<?php }
				?>
			</div>
		</div>
	</header><!-- .archive-header -->

	<?php
}


function oskar_header_title_fallback() {

	$bg_image_url = get_header_image();

	?>
	<header id="header-title" class="archive-header with-image full" style="background-image: url('<?php echo $bg_image_url; ?>')">
	</header><!-- .entry-header -->

	<?php
}
