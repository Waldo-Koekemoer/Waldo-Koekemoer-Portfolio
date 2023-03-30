(function( $ ) {
	'use strict';

	jQuery(document).ready(function($){

    // Sortable
    $( "#main-skills-list-wrap" ).sortable();

    // Color picker
    $('.wsc-color-field').wpColorPicker();

    // Add Handler
    $('input.btn-add-skill-item').on('click', function(e){

      e.preventDefault();
      var mytemplate = $("#template-wsc-skill-item").html();
      $('#main-skills-list-wrap').append(mytemplate);
      $('.txt-skill-title').focus();
      $('.wsc-color-field').wpColorPicker();
      return;

    });

    // Remove Handler
    $(document).on('click','input.btn-remove-skill-item', function(e){

      e.preventDefault();
      // Confirmation
      var confirmation = confirm(WSC_OBJ.lang.are_you_sure);
      if( ! confirmation ){
        return false;
      }
      // Remove now
      var $this = $(this);
      var $wrap = $this.parent();
      $wrap.fadeOut('slow',function(){
        $wrap.remove();
      });

    })

  });

})( jQuery );
