<?php
	//Client active callback
	function formula_client_content ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_client_disabled' )->value() == true ); 
	}
	function formula_client_autoplay ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_client_disabled' )->value() == true ); 
	}
	
	// Client Disable + Autoplay Disable
	function formula_client_animation_speed ( $control ) {
		return true === (
			$control->manager->get_setting( 'formula_client_disabled' )->value() == true &&
			$control->manager->get_setting( 'formula_client_autoplay' )->value() == true 
		);
	}
	
	// Client Title
	function formula_client_area_title ( $control ) {
		return true === ($control->manager->get_setting( 'formula_client_disabled' )->value() == true ); 
	}
	
	// Client Description
	function formula_client_area_desc ( $control ) {
		return true === ($control->manager->get_setting( 'formula_client_disabled' )->value() == true );
	}
	
	//Container
	function formula_client_container_size ( $control ) {
		return true === ($control->manager->get_setting( 'formula_client_disabled' )->value() == true ); 
	}
	
	//Column
	function formula_client_column_layout ( $control ) {
		return true === ($control->manager->get_setting( 'formula_client_disabled' )->value() == true ); 
	}
?>