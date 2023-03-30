	jQuery("body").ready(function(){

		var fileFrame;
		jQuery('.upload_image_button').on('click', function(e){
			e.preventDefault();
			
			element = jQuery(this);
			id = jQuery(element).attr('data-id');
			
			if(fileFrame){
				fileFrame.open();
				return;
			}
			
			fileFrame = wp.media.frames.file_frame = wp.media({
				tile: jQuery(this).data('uploader_title'),
				button: {
					text: jQuery(this).data('uploader_button_text')
				},
				multiple: false,
				library: { type: 'image' }
			});
			
			fileFrame.on('select', function(){
				attachment = fileFrame.state().get('selection').first().toJSON();
				
				if(attachment.url){					
					jQuery('input[name="mp_images' + id + '"]').val(attachment.url);
					jQuery('#slider_preview_img' + id).attr('src', attachment.url).fadeIn();
					jQuery(element).parent().find('.slider_remove_img').show();
				}
			});
			
			fileFrame.open();
		});
		
		jQuery('.slider_remove_img').on("click", function(e){
			e.preventDefault();
			
			element = jQuery(this);
			id = jQuery(element).attr('data-id');
			image = jQuery('#slider_preview_img' + id);
			
			jQuery('input[name="mp_images' + id + '"]').val('');
			jQuery(image).fadeOut();
			jQuery(element).hide();
		});

	});
	
	
	// For Audio Files
	jQuery("body").ready(function(){

		var fileFrame;
		jQuery('.upload_mp3_button').on('click', function(e){
			e.preventDefault();
			
			element = jQuery(this);
			id = jQuery(element).attr('data-id');
			
			if(fileFrame){
				fileFrame.open();
				return;
			}
			
			fileFrame = wp.media.frames.file_frame = wp.media({
				tile: jQuery(this).data('uploader_title'),
				button: {
					text: jQuery(this).data('uploader_button_text')
				},
				multiple: false,
				library: { type: 'audio' }
			});
			
			fileFrame.on('select', function(){
				attachment = fileFrame.state().get('selection').first().toJSON();
				
				if(attachment.url){					
					jQuery('input[name="mp_tracks' + id + '"]').val(attachment.url);
					jQuery('#slider_preview_mp3' + id).attr('src', attachment.url).fadeIn();
					jQuery(element).parent().find('.slider_remove_mp3').show();
				}
			});
			
			fileFrame.open();
		});
		
		jQuery('.slider_remove_mp3').on("click",function(e){
			e.preventDefault();
			
			element = jQuery(this);
			id = jQuery(element).attr('data-id');
			image = jQuery('#slider_preview_mp3' + id);
			
			jQuery('input[name="mp_tracks' + id + '"]').val('');
			jQuery(image).fadeOut();
			jQuery(element).hide();
		});

	});