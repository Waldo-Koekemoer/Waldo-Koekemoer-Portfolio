<?php
	//Team active callback
	function formula_team_content ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_team_disabled' )->value() == true ); 
	}
	function formula_team_autoplay_disable ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_team_disabled' )->value() == true ); 
	}
	
	// Team Disable + Autoplay Disable
	function formula_team_animation_speed ( $control ) {
		return true === (
			$control->manager->get_setting( 'formula_team_disabled' )->value() == true &&
			$control->manager->get_setting( 'formula_team_autoplay_disable' )->value() == true 
		);
	}
	
	// Team Title
	function formula_team_area_title ( $control ) {
		return true === ($control->manager->get_setting( 'formula_team_disabled' )->value() == true ); 
	}
	
	// Team Description
	function formula_team_area_des ( $control ) {
		return true === ($control->manager->get_setting( 'formula_team_disabled' )->value() == true );
	}
	
	//Container
	function formula_team_container_size ( $control ) {
		return true === ($control->manager->get_setting( 'formula_team_disabled' )->value() == true ); 
	}
	
	//Column
	function formula_team_column_layout ( $control ) {
		return true === ($control->manager->get_setting( 'formula_team_disabled' )->value() == true ); 
	}
?>