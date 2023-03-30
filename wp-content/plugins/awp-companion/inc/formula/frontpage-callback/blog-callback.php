<?php
	//Blog active callback
	function formula_theme_blog_category ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_blog_disabled' )->value() == true ); 
	}
	
	// Title
	function formula_blog_area_title ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_blog_disabled' )->value() == true ); 
	}
	
	// Description
	function formula_blog_area_des ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_blog_disabled' )->value() == true ); 
	}
	
	// Button
	function formula_blog_area_button ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_blog_disabled' )->value() == true ); 
	}
	
	// Button Link
	function formula_blog_section_button_link ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_blog_disabled' )->value() == true ); 
	}
	
	//Container
	function formula_blog_container_size ( $control ) {
		return true === ($control->manager->get_setting( 'formula_blog_disabled' )->value() == true ); 
	}
	
	//Column
	function formula_blog_column_layout ( $control ) {
		return true === ($control->manager->get_setting( 'formula_blog_disabled' )->value() == true ); 
	}
	
	//Column
	function formula_blog_count ( $control ) {
		return true === ($control->manager->get_setting( 'formula_blog_disabled' )->value() == true ); 
	}