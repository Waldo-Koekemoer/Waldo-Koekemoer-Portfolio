jQuery(document).ready(function($) {
	$value=$("#chart-type").val();
	//console.log($value);
       if($value=='bar')
       {
        $('.bar-section').show(); //hide
        $('.circle-section').hide(); //set default class to be shown here, or remove to hide all
    	}
    	else{
    		$('.circle-section').show(); //hide
        	$('.bar-section').hide();
    	}
jQuery('#chart-type').change(function($) { //on change do stuff
        jQuery('.bar-section').toggle();
        jQuery('.circle-section').toggle(); 
        jQuery('.' + jQuery(this).val()).show(); //show selected option's respective element
});});