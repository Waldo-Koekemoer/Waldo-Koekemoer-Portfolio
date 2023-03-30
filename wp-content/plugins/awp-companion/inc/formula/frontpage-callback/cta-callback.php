<?php
	//Callout active callback
	function formula_cta_background_image ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_cta_disabled' )->value() == true ); 
	}
	function formula_cta_button_link ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_cta_disabled' )->value() == true ); 
	}
	
	// Callout Title
	function formula_cta_area_title ( $control ) {
		return true === ($control->manager->get_setting( 'formula_cta_disabled' )->value() == true ); 
	}
	
	// Callout Description
	function formula_cta_area_des ( $control ) {
		return true === ($control->manager->get_setting( 'formula_cta_disabled' )->value() == true );
	}
	
	// Callout Description
	function formula_cta_button_text ( $control ) {
		return true === ($control->manager->get_setting( 'formula_cta_disabled' )->value() == true );
	}
	
	// Callout info Title 1 2 3
	function top_bottom_info_title_1 ( $control ) {
		return true === ($control->manager->get_setting( 'formula_cta_disabled' )->value() == true );
	}
	function top_bottom_info_title_2 ( $control ) {
		return true === ($control->manager->get_setting( 'formula_cta_disabled' )->value() == true );
	}
	function top_bottom_info_title_3 ( $control ) {
		return true === ($control->manager->get_setting( 'formula_cta_disabled' )->value() == true );
	}
	
	// Callout info Description 1 2 3
	function top_bottom_info_desc_1 ( $control ) {
		return true === ($control->manager->get_setting( 'formula_cta_disabled' )->value() == true );
	}
	function top_bottom_info_desc_2 ( $control ) {
		return true === ($control->manager->get_setting( 'formula_cta_disabled' )->value() == true );
	}
	function top_bottom_info_desc_3 ( $control ) {
		return true === ($control->manager->get_setting( 'formula_cta_disabled' )->value() == true );
	}
	
	//Container
	function formula_cta_container_size ( $control ) {
		return true === ($control->manager->get_setting( 'formula_cta_disabled' )->value() == true ); 
	}
?>