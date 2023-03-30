<?php if( ! defined( 'ABSPATH' ) ) exit;
	
	function music_press_how_to_scripts() {
		wp_enqueue_style( 'how-to-use', get_template_directory_uri() . '/include/pro/pro.css' );
	}
	
	add_action( 'admin_enqueue_scripts', 'music_press_how_to_scripts' );	
	
	// create custom plugin settings menu
	add_action('admin_menu', 'music_press__create_menu');
	
	function music_press__create_menu() {
		
		//create new top-level menu
		global $music_press__settings_page;
		
		$music_press__settings_page = add_theme_page('Music Press', 'Music Press', 'edit_theme_options',  'music_press-unique-identifier', 'music_press__settings_page',1);
		
		//call register settings function
		add_action( 'admin_init', 'register_mysettings' );
	}
	
	function register_mysettings() {
		//register our settings
		register_setting( 'seos-settings-group', 'adsense' );
	}
	
	function music_press__settings_page() {	
	$path_img = get_template_directory_uri()."/include/pro/"; ?>
	<div id="cont-pro">
		<h1><?php esc_html_e('Music Press WordPress Theme', 'music-press'); ?></h1>	
		<div class="pro-links">	
			<p><?php esc_html_e('We create free themes and have helped thousands of users to build their sites. You can also support us using the Music Press Pro theme with many new features and extensions.', 'music-press'); ?></p>
			<a class="button button-primary" target="_blank" href="https://seosthemes.com/themes/music-press-wordpress-theme/"><?php esc_html_e('Theme Demo', 'music-press'); ?></a>
			<a style="background: #A83625;" class="reds button button-primary" target="_blank" href="https://seosthemes.com/music-press"><?php esc_html_e('Upgrade to PRO', 'music-press'); ?></a>
		</div>	
		<table id="table-colors" class="free-wp-theme">
			<tbody>
				<tr>
					<th><?php esc_html_e('Music Press WordPress Theme', 'music-press'); ?></th>
					<th><?php esc_html_e('Free WP Theme','music-press'); ?></th>
					<th><?php esc_html_e('Premium WP Theme','music-press'); ?></th>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('YouTybe Player', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>				
				<tr>
					<td><strong><?php esc_html_e('Featured Header Image on Each Single Page', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Timeline', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Search Filter by Post Price, Name and Category', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>				
				<tr class="s-white">
					<td><strong><?php esc_html_e('Widget Top', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Widget Bottom', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Breadcrumbs', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Category Page - Video, Slider and Price Options', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Testimonials', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Preloader', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>					
				<tr class="s-white">
					<td><strong><?php esc_html_e('About US', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>				
				<tr>
					<td><strong><?php esc_html_e('Sidebar Position Single Pages', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Counter', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>								
				<tr>
					<td><strong><?php esc_html_e('Portfolio Filter', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Recent Posts Slider', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Popular Posts', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>							
				<tr class="s-white">
					<td><strong><?php esc_html_e('Page Right Sidebar', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>				
				<tr>
					<td><strong><?php esc_html_e('Page Left Sidebar', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>					
				<tr class="s-white">
					<td><strong><?php esc_html_e('Blog Page', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Blog Page Right Sidebar', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Blog Page Full Width', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Blog Page Three Columns', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Blog Page Two Columns', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>					
				<tr>
					<td><strong><?php esc_html_e('Camera Slider', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Title Position', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('One Click Demo Import', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>					
				<tr class="s-white">
					<td><strong><?php esc_html_e('Post Options', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('WooCommerce My Account Icon', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Multiple Gallery', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Animations of all elements', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Header Options', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Hide Single Page Title', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Featured Image', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('WooCommerce Product Zoom', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('WooCommerce Cart Options', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('WooCommerce Pagination', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				
				<tr class="s-white">
					<td><strong><?php esc_html_e('Google Fonts', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Shortcode', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Color of All Elements', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Full Width Page', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>	
				<tr class="s-white">
					<td><strong><?php esc_html_e('Social Media Icons', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Custom Footer Copyright', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Microdata', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Translation Ready', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Header Logo', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Homepage Widgets', 'music-press'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<tr class="s-white">
						<td><strong><?php esc_html_e('Header Image', 'music-press'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
					<tr>
						<td><strong><?php esc_html_e('Background Image', 'music-press'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
					<tr class="s-white">
						<td><strong><?php esc_html_e('404 Page Template', 'music-press'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
					<tr>
						<td><strong><?php esc_html_e('Footer Widgets', 'music-press'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
					<tr class="s-white">
						<td><strong><?php esc_html_e('WooCommerce Plugin Support', 'music-press'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
					<tr>
						<td><strong><?php esc_html_e('Back to top button', 'music-press'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
					<tr class="s-white">
						<td><strong><?php esc_html_e('Video Header', 'music-press'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>						
					<tr>
						
						<td><a class="button button-primary" target="_blank" href="https://seosthemes.com/themes/music-press-wordpress-theme/"><?php esc_html_e('Theme Demo', 'music-press'); ?></a></td>
						<td> </td>
						<td style=" text-align:center;"><a style="background: #A83625;" class="reds button button-primary" target="_blank" href="https://seosthemes.com/music-press"><?php esc_html_e('Upgrade to PRO', 'music-press'); ?></a></td>
					</tr>					
				</tbody>
			</table>
		</div>
		<?php	
		}				