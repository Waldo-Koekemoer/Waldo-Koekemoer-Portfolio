"use strict";

jQuery( function ($) {

	$( document ).on('click', '.oskar-admin-notice .notice-dismiss', function () {
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'oskar_admin_notice_dismiss',
				'oskar-nonce-name': oskar.oskar_nonce
			}
		});
	});

});
