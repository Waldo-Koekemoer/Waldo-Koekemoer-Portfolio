<?php
	//Service active callback
	function formula_service_content ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_service_area_disabled' )->value() == true ); 
	}
	
	function formula_service_area_title ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_service_area_disabled' )->value() == true ); 
	}
	
	function formula_service_area_des ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_service_area_disabled' )->value() == true ); 
	}
	
	function formula_service_background ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_service_area_disabled' )->value() == true ); 
	}
	
	// Container
	function formula_service_container_size ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_service_area_disabled' )->value() == true ); 
	}
	// Column
	function formula_service_column_layout ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_service_area_disabled' )->value() == true ); 
	}
	// Service Count
	function formula_service_count ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_service_area_disabled' )->value() == true ); 
	}
?>