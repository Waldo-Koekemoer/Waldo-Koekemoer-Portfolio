<style>

#wpsm_progress_b_row_<?php echo esc_attr($postId); ?> .indiCol{    
    position: relative;
    padding-right: 15px;
    padding-left: 15px;
}    

#wpsm_progress_b_row_<?php echo esc_attr($postId); ?> .wpsm_progress .wpsm_progress-pro-bar {
    background: <?php echo esc_attr($slider_bg_clr); ?>;
    margin:5px 0 20px 0;
}

#wpsm_progress_b_row_<?php echo esc_attr($postId); ?> .wpsm_progress .wpsm_progress-title{
    font-size: <?php echo esc_attr($progress_title_font_size); ?>px;
    font-weight: <?php echo esc_attr($progress_title_font_weight); ?>;
	font-family: <?php echo esc_attr($font_family); ?>;
    color: <?php echo esc_attr($progress_title_clr); ?>;
    line-height: 22px;
}
#wpsm_progress_b_row_<?php echo esc_attr($postId); ?> .wpsm_progress .wpsm_progress-value{
    line-height: 22px;
    position: absolute;
    top: 0;
    right: 0;
	font-style: normal;
	font-size: <?php echo esc_attr($progress_title_font_size); ?>px;
    font-weight: <?php echo esc_attr($progress_title_font_weight); ?>;
    color: <?php echo esc_attr($slider_op_clr); ?>;
}

#wpsm_progress_b_row_<?php echo esc_attr($postId); ?> .wpsm_progress .wpsm_progress-bar {
	background-color: <?php echo esc_attr($slider_clr); ?>;
    animation: animate-positive 2s;
    height:4px;
}

@-webkit-keyframes animate-positive{
    0% { width: 0%; }
}
@keyframes animate-positive{
    0% { width: 0%; }
}

<?php echo esc_attr($custom_css); ?>
</style>
