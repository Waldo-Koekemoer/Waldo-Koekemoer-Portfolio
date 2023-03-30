<?php
	//Top Info
	function formula_top_info_content ( $control ) {
		return true === ($control->manager->get_setting( 'formula_top_info_disabled' )->value() == true);
	}
	//Container
	function formula_top_info_container_size ( $control ) {
		return true === ($control->manager->get_setting( 'formula_top_info_disabled' )->value() == true); 
	}
	
	//Column
	function formula_top_info_column_layout ( $control ) {
		return true === ($control->manager->get_setting( 'formula_top_info_disabled' )->value() == true); 
	}