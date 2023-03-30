<?php
	//Woocommerce
	
	// Title
	function formula_woocommerce_area_title ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_woocommerce_disabled' )->value() == true ); 
	}
	
	// Description
	function formula_woocommerce_area_desc ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_woocommerce_disabled' )->value() == true ); 
	}

	//Autoplay
	function formula_woocommerce_autoplay ( $control ) {
		return true === ($control->manager->get_setting( 'formula_woocommerce_disabled' )->value() == true ); 
	}

	//Animation speed
	function formula_woocommerce_animation_speed ( $control ) {
		return true === ($control->manager->get_setting( 'formula_woocommerce_disabled' )->value() == true ); 
	}

	//Container
	function formula_woocommerce_container_size ( $control ) {
		return true === ($control->manager->get_setting( 'formula_woocommerce_disabled' )->value() == true ); 
	}
	
	//Column
	function formula_woocommerce_column_layout ( $control ) {
		return true === ($control->manager->get_setting( 'formula_woocommerce_disabled' )->value() == true ); 
	}