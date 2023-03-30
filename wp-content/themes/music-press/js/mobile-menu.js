jQuery("body").ready(function () {
  var fastVisibleOrNo=0;
  jQuery("#s-button-menu").on('click',function() {
    if (jQuery("#site-navigation").is(':hidden')) {
      fastVisibleOrNo=1;
	  jQuery("#site-navigation").css("display","flex");
    } else {
      fastVisibleOrNo=0;
    }
    setTimeout(function(){
      if (fastVisibleOrNo) {
        jQuery("#site-navigation").show(400);
		if ( jQuery( window ).width() <= 800 ) {
			const focusableElements =
				'button, #s-button-menu, [href], [tabindex]:not([tabindex="-1"])';
			const modal = document.querySelector('#site-navigation'); // select the modal by it's id
			const modal_1 = document.querySelector('#s-button-menu'); // select the modal by it's id
			const firstFocusableElement = modal.querySelectorAll(focusableElements)[0]; // get first element to be focused inside modal
			const focusableContent = modal.querySelectorAll(focusableElements);
			const lastFocusableElement = focusableContent[focusableContent.length - 1]; // get last element to be focused inside modal
			document.addEventListener('keydown', function(e) {
			  let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
			  if (!isTabPressed) {
				return;
			  }
			  if (e.shiftKey) { // if shift key pressed for shift + tab combination
				if (document.activeElement === firstFocusableElement) {
				  lastFocusableElement.focus(); // add focus for the last focusable element
				  e.preventDefault();
				}
			  } else { // if tab key is pressed
				if (document.activeElement === lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
				  modal_1.focus(); // add focus for the first focusable element
				  e.preventDefault();
				}
			  }
			});
			firstFocusableElement.focus();
		}
      } else {
        jQuery("#site-navigation").hide(400);
      }
    },200);
  });
});