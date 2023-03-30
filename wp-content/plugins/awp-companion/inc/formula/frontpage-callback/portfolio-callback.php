<?php
	// Portfolio active callback
	// Title
	function formula_project_area_title ( $control ) {
		return true === ($control->manager->get_setting( 'formula_portfolio_disabled' )->value() == true ); 
	}

	// Description
	function formula_project_area_des ( $control ) {
		return true === ($control->manager->get_setting( 'formula_portfolio_disabled' )->value() == true ); 
	}

	// Portfolio content
	function formula_portfolio_content ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_portfolio_disabled' )->value() == true ); 
	}

	// Portfolio Autoplay
	function formula_portfolio_autoplay_disable ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_portfolio_disabled' )->value() == true ); 
	}

	// Portfolio Disable + Autoplay Disable
	function formula_portfolio_animation_speed ( $control ) {
		return true === (
			$control->manager->get_setting( 'formula_portfolio_disabled' )->value() == true &&
			$control->manager->get_setting( 'formula_portfolio_autoplay_disable' )->value() == true 
		);
	}

	//Container
	function formula_portfolio_container_size ( $control ) {
		return true === ($control->manager->get_setting( 'formula_portfolio_disabled' )->value() == true ); 
	}

	//Column
	function formula_portfolio_homepage1_column_layout ( $control ) {
		return true === (
			//$control->manager->get_setting( 'formula_homepage_template_design' )->value() == 'formula_homepage_template_1' &&
			$control->manager->get_setting( 'formula_portfolio_disabled' )->value() == true
		); 
	}
	//Column Layout Template 2
	function formula_portfolio_homepage2_column_layout ( $control ) {
		return true === (
		//$control->manager->get_setting( 'formula_homepage_template_design' )->value() == 'formula_homepage_template_2' &&
		$control->manager->get_setting( 'formula_portfolio_disabled' )->value() == true
		); 
	}

	//Portfolio Count
	function formula_portfolio_count ( $control ) {
		return true === ($control->manager->get_setting( 'formula_portfolio_disabled' )->value() == true ); 
	}	

	//Masonry Count
	function formula_portfolio_masonry ( $control ) {
		return true === ($control->manager->get_setting( 'formula_portfolio_disabled' )->value() == true ); 
	}	