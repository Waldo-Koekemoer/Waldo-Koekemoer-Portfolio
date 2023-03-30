<?php
/**
 * Theme help
 *
 * Adds theme page to the Appearance section of the WordPress Dashboard.
 *
 * @package Oskar
 */

// Add theme page to Appearance menu.
function oskar_add_theme_help_page() {

	$theme = wp_get_theme();

	add_theme_page(
		/* translators: %1$s = theme name, %2$s = theme version */
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'oskar' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ), esc_html__( 'Oskar Theme', 'oskar' ), 'edit_theme_options', 'oskar', 'oskar_display_theme_help_page'
	);
}
add_action( 'admin_menu', 'oskar_add_theme_help_page' );

function oskar_add_theme_appearance_menu( $wp_admin_bar ) {
	if ( !is_admin() && current_user_can( 'edit_theme_options' ) ) {
		$wp_admin_bar->add_node(
			array(
				'parent' => 'appearance',
				'id' => 'oskar-theme',
				'title' => esc_html__( 'Oskar Theme', 'oskar' ),
				'href' => esc_url( admin_url( 'themes.php?page=oskar' ) )
			)
		);
	}
}
add_action( 'admin_bar_menu', 'oskar_add_theme_appearance_menu', 100 );

function oskar_admin_notice() {
	$notice_dismissed = get_user_meta( get_current_user_id(), 'oskar_admin_notice_dismiss', true );
	if ( '1' !== $notice_dismissed ) {
		oskar_admin_notice_html();
	}
}
add_action( 'admin_notices', 'oskar_admin_notice' );

function oskar_admin_notice_html() {
	$screen = get_current_screen();

	if ( ! empty( $screen->base ) && 'appearance_page_oskar' === $screen->base ) {
		return false;
	}
	?>
	<div class="notice notice-info is-dismissible oskar-admin-notice">
		<div class="oskar-admin-notice-wrapper">
			<h2 style="margin-top: 1em;"><?php esc_html_e( 'Welcome to the Oskar theme.', 'oskar' ); ?></h2>
			<p><?php
			/* translators: %s = link to theme page */
			printf( esc_html__( 'Check out the %s and customize the style of your website just how you like it.', 'oskar' ), '<a href="' . esc_url( admin_url( 'themes.php?page=oskar' ) ) . '">' . esc_html__( 'theme options', 'oskar' ) . '</a>'); ?></p>
		</div>
	</div>
	<?php
}

function oskar_admin_notice_dismiss() {
	check_ajax_referer( 'oskar-nonce', 'oskar-nonce-name' );
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( -1 );
	}

	update_user_meta( get_current_user_id(), 'oskar_admin_notice_dismiss', 1 );

	wp_die( 1 );
}
add_action( 'wp_ajax_oskar_admin_notice_dismiss', 'oskar_admin_notice_dismiss' );

// Display Theme help page.
function oskar_display_theme_help_page() {

	$theme_update_html = '';
	$theme = wp_get_theme();

	if ( current_user_can( 'update_themes' ) ) {
		$stylesheet = $theme->get_stylesheet();
		$themes_update = get_site_transient( 'update_themes' );
		if ( isset( $themes_update->response[ $stylesheet ] ) ) {
			$theme_update_html = '<p class="update-available"><a href="' . esc_url( admin_url('themes.php') ) . '">' . esc_html__( 'New version available', 'oskar' ) . '</a></p>';
		}
	}
	?>

	<div class="wrap theme-help-wrap">
		<div class="columns-wrapper theme-header clearfix">
			<div class="column column-two-thirds clearfix">
				<h1><?php
				/* translators: %s = theme name */
				printf( esc_html__( 'Welcome to %s', 'oskar' ), esc_html( $theme->get( 'Name' ) ) ); ?></h1>
			</div>
			<div class="column column-third clearfix">
				<p class="theme-version"><?php
				/* translators: %s = theme version */
				printf( esc_html__( 'Version: %s', 'oskar' ), '<span class="version-number">' . esc_html( $theme->get( 'Version' ) ) . '</span>' ); ?>
				</p>
				<?php echo $theme_update_html; ?>
			</div>
		</div>
		<div class="columns-wrapper theme-intro clearfix">
			<div class="column column-two-thirds clearfix">
				<p class="theme-description"><?php echo esc_html( $theme->get( 'Description' ) ); ?></p>
				<p class="theme-buttons"><a href="<?php echo esc_url( 'https://uxlthemes.com/theme/oskar/' ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Theme Page', 'oskar' ); ?></a><a href="<?php echo esc_url( 'https://uxlthemes.com/demo/oskar/' ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Theme Demo', 'oskar' ); ?></a></p>
			</div>
			<div class="column column-third clearfix">
				<div class="screenshot-wrap">
					<img src="<?php echo esc_url( OSKAR_TEMPLATE_DIR_URI . '/screenshot.png' ); ?>" alt="<?php echo esc_attr( $theme->get( 'Name' ) ); ?>" class="screenshot" />
				</div>
			</div>
		</div>
		<h3><?php esc_html_e( 'Customize your site', 'oskar' ); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="column column-quarter is-responsive clearfix">
					<p><a href="<?php echo esc_url( add_query_arg( 'autofocus[section]', 'title_tagline', wp_customize_url() ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Identity', 'oskar' ); ?></a></p>
				</div>
				<div class="column column-three-quarters is-responsive clearfix">
					 <p><?php esc_html_e( 'Add a Logo, Site Icon and edit your Site Title and Tagline.', 'oskar' ); ?></p>
				</div>
			</div>
			<div class="column column-half clearfix">
				<div class="column column-quarter is-responsive clearfix">
					<p><a href="<?php echo esc_url( add_query_arg( 'autofocus[section]', 'static_front_page', wp_customize_url() ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Homepage', 'oskar' ); ?></a></p>
				</div>
				<div class="column column-three-quarters is-responsive clearfix">
					 <p><?php esc_html_e( 'Choose a Home Page, Blog Page and setup the Homepage Sections including the Featured Services.', 'oskar' ); ?></p>
				</div>
			</div>
		</div>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="column column-quarter is-responsive clearfix">
					<p><a href="<?php echo esc_url( add_query_arg( 'autofocus[section]', 'layout', wp_customize_url() ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Layout', 'oskar' ); ?></a></p>
				</div>
				<div class="column column-three-quarters is-responsive clearfix">
					 <p><?php esc_html_e( 'Container Width, Spacing, Responsive Breakpoints, Page Title Layout, Blog Grid Layout and Sidebar Position.', 'oskar' ); ?></p>
				</div>
			</div>
			<div class="column column-half clearfix">
				<div class="column column-quarter is-responsive clearfix">
					<p><a href="<?php echo esc_url( add_query_arg( 'autofocus[section]', 'colors', wp_customize_url() ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Colors', 'oskar' ); ?></a></p>
				</div>
				<div class="column column-three-quarters is-responsive clearfix">
					 <p><?php esc_html_e( 'Edit the theme Colors and put your own style on your website.', 'oskar' ); ?></p>
				</div>
			</div>
		</div>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="column column-quarter is-responsive clearfix">
					<p><a href="<?php echo esc_url( add_query_arg( 'autofocus[section]', 'typography', wp_customize_url() ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Typography', 'oskar' ); ?></a></p>
				</div>
				<div class="column column-three-quarters is-responsive clearfix">
					 <p><?php esc_html_e( 'Select Fonts and optionally save Google Fonts locally, edit the Site Title, Navigation, Content and Headings Fonts and Font Sizes.', 'oskar' ); ?></p>
				</div>
			</div>
			<div class="column column-half clearfix">
				<div class="column column-quarter is-responsive clearfix">
					<p><a href="<?php echo esc_url( add_query_arg( 'autofocus[section]', 'header_image', wp_customize_url() ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Header Image', 'oskar' ); ?></a></p>
				</div>
				<div class="column column-three-quarters is-responsive clearfix">
					 <p><?php esc_html_e( 'Upload your own Header Image and choose where to display it.', 'oskar' ); ?></p>
				</div>
			</div>
		</div>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="column column-quarter is-responsive clearfix">
					<p><a href="<?php echo esc_url( add_query_arg( 'autofocus[section]', 'menu_locations', wp_customize_url() ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Menus', 'oskar' ); ?></a></p>
				</div>
				<div class="column column-three-quarters is-responsive clearfix">
					 <p><?php esc_html_e( 'Create a Header Menu and a Footer Menu.', 'oskar' ); ?></p>
				</div>
			</div>
			<div class="column column-half clearfix">
				<div class="column column-quarter is-responsive clearfix">
					<p><a href="<?php echo esc_url( add_query_arg( 'autofocus[panel]', 'widgets', wp_customize_url() ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Widgets', 'oskar' ); ?></a></p>
				</div>
				<div class="column column-three-quarters is-responsive clearfix">
					 <p><?php esc_html_e( 'Edit the Widget Areas including Homepage Slider/Hero, Top Bar, Offers Bar, Sidebars, Footer Columns and Shop Filters.', 'oskar' ); ?></p>
				</div>
			</div>
		</div>
		<h3><?php esc_html_e( 'Advanced', 'oskar' ); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="column column-quarter is-responsive clearfix">
					<p><a href="<?php echo esc_url( add_query_arg( 'autofocus[section]', 'header_footer', wp_customize_url() ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Header/Footer', 'oskar' ); ?></a></p>
				</div>
				<div class="column column-three-quarters is-responsive clearfix">
					 <p><?php esc_html_e( 'Build your own custom Header and Footer.', 'oskar' ); ?></p>
				</div>
			</div>
			<div class="column column-half clearfix">
				<div class="column column-quarter is-responsive clearfix">
					<p><a href="<?php echo esc_url( add_query_arg( 'autofocus[section]', 'custom_css', wp_customize_url() ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Custom CSS', 'oskar' ); ?></a></p>
				</div>
				<div class="column column-three-quarters is-responsive clearfix">
					 <p><?php esc_html_e( 'Add your own CSS code to customize the appearance and layout of your site.', 'oskar' ); ?></p>
				</div>
			</div>
		</div>
		<h3><?php esc_html_e( 'Upgrade', 'oskar' ); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="column column-quarter is-responsive clearfix">
					<p><a href="<?php echo esc_url( 'https://uxlthemes.com/theme/oskar-pro/' ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'GO PRO', 'oskar' ); ?></a></p>
				</div>
				<div class="column column-three-quarters is-responsive clearfix">
					 <p><?php esc_html_e( 'Upgrade to Oskar Pro for even more cool features and customization options.', 'oskar' ); ?></p>
				</div>
			</div>
		</div>
		<hr class="separator-spacing">
		<div>
			<p><?php
				/* translators: %1$s = theme name, %2$s = theme author, %3$s = link to wordpress.org reviews */
				printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'oskar' ), esc_html( $theme->get( 'Name' ) ), '<a target="_blank" href="https://uxlthemes.com/" title="UXL Themes">UXL Themes</a>', '<a target="_blank" href="https://wordpress.org/support/theme/oskar/reviews/?filter=5" title="' . esc_html__( 'Oskar Review', 'oskar' ) . '">' . esc_html__( 'please rate it', 'oskar' ) . '</a>' ); ?></p>
		</div>
	</div>

	<?php
}

// Add CSS for theme page.
function oskar_theme_help_page_css( $hook ) {
	if ( 'appearance_page_oskar' === $hook ) {
		wp_enqueue_style( 'oskar-theme-help', OSKAR_TEMPLATE_DIR_URI . '/assets/css/theme-help.css', '', OSKAR_VERSION );
	} else {
		wp_enqueue_script( 'oskar-admin', OSKAR_TEMPLATE_DIR_URI . '/assets/js/admin.js', array(), OSKAR_VERSION, true );
		wp_localize_script( 'oskar-admin', 'oskar',
			array(
				'oskar_nonce' => wp_create_nonce( 'oskar-nonce' )
			)
		);
	}
}
add_action( 'admin_enqueue_scripts', 'oskar_theme_help_page_css' );
