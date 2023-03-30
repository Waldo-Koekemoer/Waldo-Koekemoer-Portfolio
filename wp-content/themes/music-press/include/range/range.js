(function ($) {
    $("body").ready(function ($) {
        $('input[data-input-type]').on('input click, change', function () {
            let val = $(this).val();
            $(this).prev('.custom-range-value').html(val);
            $(this).val(val);
		});
		
		const defaultRange = document.getElementById("range_logo_width");
		if(defaultRange){
			defaultRange.addEventListener("click", logoWidth);
		}
		
		function logoWidth() {
			document.getElementById("input_logo_width").value ="250";
			document.getElementById("value_logo_width").innerHTML ="250";
		}
	})
})(jQuery);



