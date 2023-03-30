<?php
	//Testimonial active callback
	function formula_testimonial_autoplay ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_testimonial_disabled' )->value() == true ); 
	}
	
	// Animation
	function formula_testimonial_animation_speed ( $control ) {
		return true === (
			$control->manager->get_setting( 'formula_testimonial_disabled' )->value() == true &&
			$control->manager->get_setting( 'formula_testimonial_autoplay' )->value() == true 
		);
	}
	
	//Content
	function formula_testimonial_content ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_testimonial_disabled' )->value() == true ); 
	}
	
	//Background Image + Hide for Template 2 
	function formula_testimonial_background ( $control ) {
		return true === ( 
			//$control->manager->get_setting( 'formula_homepage_template_design' )->value() == 'formula_homepage_template_1' &&
			$control->manager->get_setting( 'formula_testimonial_disabled' )->value() == true 
		); 
	}
	
	// Title
	function formula_testimonial_area_title ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_testimonial_disabled' )->value() == true ); 
	}
	
	// Description
	function formula_testimonial_area_des ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_testimonial_disabled' )->value() == true ); 
	}
	
	//Container
	function formula_testimonial_container_size ( $control ) {
		return true === ($control->manager->get_setting( 'formula_testimonial_disabled' )->value() == true ); 
	}
	
	//Column
	function formula_testimonial_column_layout ( $control ) {
		return true === ($control->manager->get_setting( 'formula_testimonial_disabled' )->value() == true ); 
	}