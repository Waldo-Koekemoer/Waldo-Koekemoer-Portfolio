<?php
 if ( ! defined( 'ABSPATH' ) ) exit;
class progressbar_wp {
	private static $instance;
    public static function forge() {
        if (!isset(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }
	
	private function __construct() {
		add_action('admin_enqueue_scripts', array(&$this, 'progressbar_wp_admin_scripts'));
       
      
		if (is_admin()) {
			add_action('init', array(&$this, 'progressbar_wp_register_cpt'), 1);
			add_action('add_meta_boxes', array(&$this, 'progressbar_wp_meta_boxes_group'));
			add_action('admin_init', array(&$this, 'progressbar_wp_meta_boxes_group'), 1);
			add_action('save_post', array(&$this, 'add_progressbar_wp_meta_box_save'), 9, 1);
		    add_action('save_post', array(&$this, 'progressbar_wp_settings_meta_box_save'), 9, 1);
		
		}
    }
	
	// admin scripts
	public function progressbar_wp_admin_scripts(){
		if(get_post_type()=="progressbar_wp_r"){
			require_once('admin-scripts.php');
		}
	}
	
       
	public function progressbar_wp_register_cpt(){
		require_once('probar-reg.php');
		add_filter( 'manage_edit-wpsm_progressbar_r_columns', array(&$this, 'progressbar_wp_panels_columns' )) ;
		add_action( 'manage_wpsm_progressbar_r_posts_custom_column', array(&$this, 'progressbar_wp_manage_columns' ), 10, 2 );
	}
	
	function progressbar_wp_panels_columns( $columns ){
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'Progressbar' ),
            'shortcode' => __( 'Progressbar Shortcode' ),
            'date' => __( 'Date' )
        );
        return $columns;
    }

    function progressbar_wp_manage_columns( $column, $post_id ){
        global $post;
        switch( $column ) {
          case 'shortcode' :
            echo '<input style="width:225px" type="text" value="[PROGRESSBAR_WP id='.esc_html($post_id).']" readonly="readonly" />';
            break;
          default :
            break;
        }
    }
	
	// metaboxes group
	public function progressbar_wp_meta_boxes_group(){
	add_meta_box('progressbar_wp_templates', __('Select Progressbar Design', progress_bar_wp_text_domain), array(&$this, 'progressbar_wp_design_select_function'), 'progressbar_wp_r', 'normal', 'low' );	
	add_meta_box('add_wp_progressbar', __('Add Progressbar', progress_bar_wp_text_domain), array(&$this, 'add_progressbar_wp_meta_box_function'), 'progressbar_wp_r', 'normal', 'low' );
	add_meta_box ('progressbar_wp_shortcode', __('Progress Bar Shortcode', progress_bar_wp_text_domain), array(&$this, 'progressbar_wp_shortcode'), 'progressbar_wp_r', 'normal', 'low');
    add_meta_box('progressbar_wp_setting', __('Progress Bar Settings', progress_bar_wp_text_domain), array(&$this, 'add_progressbar_wp_setting_meta_box_function'), 'progressbar_wp_r', 'side', 'low');
	add_meta_box('progressbar_wp_features', __('progress bar Pro Features', progress_bar_wp_text_domain), array(&$this, 'progressbar_wp_features_function'), 'progressbar_wp_r', 'side', 'low');
	}
    
	public function progressbar_wp_design_select_function(){
		?>
		<style>
			#progressbar_wp_templates{
			background:transparent!important;
			box-shadow: none;
			border:0px;
			}
			#progressbar_wp_templates .hndle , #progressbar_wp_templates .handlediv{
			display:none;
			}
			#progressbar_wp_templates p{
			color:#000;
			font-size:15px;
			}
			#progressbar_wp_templates input {
			font-size: 16px;
			padding: 8px 10px;
			width:100%;
			}
			
		</style>
		<?php
		require_once('designs.php');
	}
	
	public function add_progressbar_wp_meta_box_function($post){
		?>
		<style>
			#add_wp_progressbar{
			background:transparent!important;
			box-shadow: none;
			border:0px;
			}
			#add_wp_progressbar .hndle , #add_wp_progressbar .handlediv{
			display:none;
			}
			#add_wp_progressbar p{
			color:#000;
			font-size:15px;
			}
			#add_wp_progressbar input {
			font-size: 16px;
			padding: 8px 10px;
			width:100%;
			}
			.handle-order-higher, .handle-order-lower{
				display:none;
			}
		</style>
		<?php
		require_once('add-progress-bar.php');
	}
	
	public function add_progressbar_wp_setting_meta_box_function($post){
		require_once('settings.php');
	}
	
    public function add_progressbar_wp_meta_box_save($PostID) {
	    require('data-post/progressbar-save-data.php');
    }
    
	public function progressbar_wp_settings_meta_box_save($PostID){
		require('data-post/progressbar-settings-save-data.php');
	}
	
	public function progressbar_wp_shortcode(){
		?>
		<style>
			#progressbar_wp_shortcode{
			background:transparent!important;
			box-shadow: none;
			border:0px;
			}
			#progressbar_wp_shortcode .hndle , #progressbar_wp_shortcode .handlediv{
			display:none;
			}
			#progressbar_wp_shortcode p{
			color:#000;
			font-size:15px;
			}
			#progressbar_wp_shortcode input {
			font-size: 16px;
			padding: 8px 10px;
			width:100%;
			}
			
		</style>
		<?php
		require_once('custom-css.php');
	
	}
	
	public function progressbar_wp_features_function(){
		?><style>
		.pro-button-div .btn-danger{    font-size: 19px;
    color: #fff;
    background-color: #01c698 !important;
    border-color: #01c698 !important;
    border-radius: 1px;
    margin-right: 10px;
    margin-top: 0px;
	width:100%;
	text-decoration:none;
	margin-bottom:10px;
	
		}
		.pro-button-div .btn-success{    font-size: 19px;
    color: #fff;
    background-color: #673ab7 !important;
    border-color: #673ab7 !important;
    border-radius: 1px;
    margin-right: 10px;
    margin-top: 0px;
	width:100%;
	text-decoration:none;
	
		}
		.pro-list li i{
		margin-right:10px;	
		}
		</style>
			<ul class="pro-list">
				<li> <i class="fa fa-check"></i><?php esc_html_e('32+ Pre Design Templates',progress_bar_wp_text_domain); ?> </li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('Half Circular Pie Layout',progress_bar_wp_text_domain); ?></li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('Full Circle Layout',progress_bar_wp_text_domain); ?></li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('Gage Layout',progress_bar_wp_text_domain); ?></li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('Individual Color',progress_bar_wp_text_domain); ?></li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('Advanced Animation',progress_bar_wp_text_domain); ?> </li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('Skin Builder',progress_bar_wp_text_domain); ?></li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('4+ Column Layout',progress_bar_wp_text_domain); ?></li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('Widget Integrated',progress_bar_wp_text_domain); ?> </li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('Add Unlimited',progress_bar_wp_text_domain); ?></li>								
				<li> <i class="fa fa-check"></i><?php esc_html_e('500+ Google Fonts',progress_bar_wp_text_domain); ?> </li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('Color Customization',progress_bar_wp_text_domain); ?> </li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('Unlimited Color Scheme',progress_bar_wp_text_domain); ?> </li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('Custom Css',progress_bar_wp_text_domain); ?> </li>
				<li> <i class="fa fa-check"></i><?php esc_html_e('All Browser Compatible',progress_bar_wp_text_domain); ?> </li>	
				<li> <i class="fa fa-check"></i><?php esc_html_e('Gutenberg Compatible',progress_bar_wp_text_domain); ?> </li>	
				<li> <i class="fa fa-check"></i><?php esc_html_e('High Priority Support',progress_bar_wp_text_domain); ?> </li>	
			</ul>
			<div class="pro-button-div">
				<a class="btn btn-danger btn-lg " href="https://wpshopmart.com/plugins/progress-bar-pro/" target="_blank"><?php esc_html_e('Check Pro Version',progress_bar_wp_text_domain); ?></a><a class="btn btn-success btn-lg " href="http://demo.wpshopmart.com/progress-bar-pro-demo/" target="_blank"><?php esc_html_e('Check Pro Demo',progress_bar_wp_text_domain); ?></a>
			</div>				
		<?php
	}
	
}
global $progressbar_wp;
$progressbar_wp = progressbar_wp::forge();
?>