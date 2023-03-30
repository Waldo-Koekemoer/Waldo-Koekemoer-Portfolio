<?php
	// Funfact active callback
	function formula_funfact_content ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_funfact_disabled' )->value() == true ); 
	}
	// Funfact Homepage 2 background
	function formula_funfact_background ( $control ) {
		return true === ( 
		//$control->manager->get_setting( 'formula_homepage_template_design' )->value() == 'formula_homepage_template_1' &&
		$control->manager->get_setting( 'formula_funfact_disabled' )->value() == true 
		
		); 
	}
	
	// container
	function formula_funfact_container_size ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_funfact_disabled' )->value() == true ); 
	}
	//Column
	function formula_funfact_column_layout ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_funfact_disabled' )->value() == true ); 
	}
	
	//Column
	function formula_funfact_count ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_funfact_disabled' )->value() == true ); 
	}
