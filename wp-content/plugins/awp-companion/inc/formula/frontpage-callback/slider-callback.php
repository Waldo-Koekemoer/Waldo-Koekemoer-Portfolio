<?php

//Slider active callback
	function formula_main_slider_content ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_main_slider_disabled' )->value() == true ); 
	}
	function formula_main_slider_autoplay_disable ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_main_slider_disabled' )->value() == true ); 
	}
	function formula_main_slider_animation ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_main_slider_disabled' )->value() == true ); 
	}
	
	// Slider Disable + Autoplay Disable
	function formula_main_slider_animation_speed ( $control ) {
		return true === (
			$control->manager->get_setting( 'formula_main_slider_disabled' )->value() == true &&
			$control->manager->get_setting( 'formula_main_slider_autoplay_disable' )->value() == true 
		);
	}
	
	// Overlay
	function formula_main_slider_overlay_disable ( $control ) {
		return true === ( $control->manager->get_setting( 'formula_main_slider_disabled' )->value() == true ); 
	}
	
	// Slider Disable + Overlay Disable (Overlay Color)
	function formula_main_slider_overlay_color ( $control ) {
		return true === (
			$control->manager->get_setting( 'formula_main_slider_disabled' )->value() == true &&
			$control->manager->get_setting( 'formula_main_slider_overlay_disable' )->value() == true 
		); 
	}
	
	// Slider Disable + Overlay Disable (Title Color)
	function formula_main_slider_caption_title_color ( $control ) {
		return true === ($control->manager->get_setting( 'formula_main_slider_disabled' )->value() == true); 
	}
	
	// Slider Disable + Overlay Disable (Subtitle Title)
	function formula_main_slider_caption_subtitle_title_color ( $control ) {
		return true === ($control->manager->get_setting( 'formula_main_slider_disabled' )->value() == true ); 
	}
	
	// Slider Disable + Overlay Disable (Caption Color)
	function formula_main_slider_caption_descrption_title_color ( $control ) {
		return true === ($control->manager->get_setting( 'formula_main_slider_disabled' )->value() == true );
	}
?>