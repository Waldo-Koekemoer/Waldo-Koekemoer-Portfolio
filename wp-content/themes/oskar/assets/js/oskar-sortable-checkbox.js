jQuery( document ).ready( function($) {

	/* === Sortable Multi-CheckBoxes === */

	/* Make it sortable. */
	$( 'ul.oskar-multicheck-sortable-list' ).sortable({
		handle: '.oskar-multicheck-sortable-handle',
		axis: 'y',
		update: function( e, ui ){
			$('input.oskar-multicheck-sortable-item').trigger( 'change' );
		}
	});

	/* On changing the value. */
	$( "input.oskar-multicheck-sortable-item" ).on( 'change', function() {

		/* Get the value, and convert to string. */
		this_checkboxes_values = $( this ).parents( 'ul.oskar-multicheck-sortable-list' ).find( 'input.oskar-multicheck-sortable-item' ).map( function() {
			var active = '0';
			if( $(this).prop("checked") ){
				var active = '1';
			}
			return this.name + ':' + active;
		}).get().join( ',' );

		/* Add the value to hidden input. */
		$( this ).parents( 'ul.oskar-multicheck-sortable-list' ).find( 'input.oskar-multicheck-sortable' ).val( this_checkboxes_values ).trigger( 'change' );

	});

	/* === Multi-CheckBoxes === */

	/* On changing the value. */
	$( "input.oskar-multicheck-item" ).on( 'change', function() {

		/* Get the value (only the "checked" item), and convert to comma separated string. */
		this_checkboxes_values = $( this ).parents( 'ul.oskar-multicheck-list' ).find( 'input.oskar-multicheck-item:checked' ).map( function() {
			return this.name;
		}).get().join( ',' );

		/* Add the value to hidden input. */
		$( this ).parents( 'ul.oskar-multicheck-list' ).find( 'input.oskar-multicheck' ).val( this_checkboxes_values ).trigger( 'change' );

	});
});