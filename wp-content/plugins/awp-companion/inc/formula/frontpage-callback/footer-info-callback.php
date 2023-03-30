<?php
	//Container
	function formula_footer_info_content ( $control ) {
		return true === ($control->manager->get_setting( 'formula_footer_info_disabled' )->value() == true	); 
	}
	
	function formula_footer_info_container_size ( $control ) {
		return true === ($control->manager->get_setting( 'formula_footer_info_disabled' )->value() == true	); 
	}
	
	//Column
	function formula_footer_info_column_layout ( $control ) {
		return true === ($control->manager->get_setting( 'formula_footer_info_disabled' )->value() == true	); 
	}