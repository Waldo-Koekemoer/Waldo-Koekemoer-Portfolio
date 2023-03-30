jQuery(document).ready(function($) {
	"use strict";

	//Icons Dropdown
	$('body').on('click', '.icon-list li', function(){
		var icon_class = $(this).find('i').attr('class');
		$(this).addClass('icon-active').siblings().removeClass('icon-active');
		$(this).parent('.icon-list').prev('.selected-icon').children('i').attr('class','').addClass(icon_class);
		$(this).parent('.icon-list').next('input').val(icon_class).trigger('change');
	});

	$('body').on('click', '.selected-icon', function(){
		$(this).toggleClass('is-open');
		$(this).next().toggleClass('is-open');
	});

});


(function ($) {

	// custom css expression for a case-insensitive contains()
	jQuery.expr[':'].Contains = function(a,i,m){
		return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
	};

	window.oskarListFilter = function(list, input) {
		$(input)
		.change( function () {
			var filter = $(this).val();
			if(filter) {
				$(list).find("b:not(:Contains(" + filter + "))").parent().hide();
				$(list).find("b:Contains(" + filter + ")").parent().show();
			} else {
				$(list).find("li").show();
			}
			return false;
		})
		.keyup( function () {
			$(this).change();
		});
	}

}(jQuery));