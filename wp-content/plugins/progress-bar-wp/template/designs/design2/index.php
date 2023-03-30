<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php require('mystyle.php'); ?>
	<?php
			$i=1;
			
			switch($pb_layout){
					case(12):
						$row=1;
					break;
					case(6):
						$row=2;
					break;
					case(4):
						$row=3;
					break;
					case(3):
						$row=4;
					break;
				}
				foreach($data as $single_data)
					{
						 $progress_title = $single_data['progress_title'];
						 $progress_size = $single_data['progress_size'];
						
	?>

				<div class="col-md-<?php echo esc_attr($pb_layout); ?> col-sm-6 indiCol">
                
				 <div class="wpsm_progress" >
                <div class="wpsm_progress-title" style="<?php //echo esc_attr($indvid_progress_title_clr);?>"><?php echo esc_html($progress_title); ?></div>
                <div class="wpsm_progress-value" style="<?php // echo esc_attr($indvid_slider_op_clr);?>"><?php echo esc_html($progress_size);?>%</div>
                <div class="wpsm_progress-pro-bar" style="<?php //echo esc_attr($indvid_slider_bg_clr);?>">
                    <div class="wpsm_progress-bar wow" style="width:<?php echo esc_attr($progress_size);?>%; <?php echo esc_attr($indvid_slider_clr);?>"></div>
                </div>
                </div>
                   
                </div>

		    <?php
		        $i++;
                   } ?>    
