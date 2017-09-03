jQuery( function ( $ ) {
	$('.cf-add-el').on('submit', function(){
		var thisForm = $(this);
		var data         = {
            action:   'add_element_ppo_contact_form',
            post_parent: ppo_contact_form.post_id,
			dataType: 'json'
        };
		data.form = {};
		$.each(thisForm.serializeArray(), function(i, field) {
			data.form[field.name] = field.value;
		});
        $.post( ajaxurl, data, function( response ) {
			if ( response.success ) {
				$( '.table-cf-el tbody' ).prepend( response.data.html );
				thisForm[0].reset();
				tb_remove();
			}else{
				console.log(response);
			}
        });
		return false;
	});
	
	$( '.table-cf-el').sortable({
        items: 'tbody tr:not(.inline-edit-row)',
        cursor: 'move',
        handle: '.column-handle',
        axis: 'y',
        forcePlaceholderSize: true,
        helper: 'clone',
        opacity: 0.65,
        placeholder: 'product-cat-placeholder',
        scrollSensitivity: 40,
        start: function( event, ui ) {
            if ( ! ui.item.hasClass( 'alternate' ) ) {
                ui.item.css( 'background-color', '#ffffff' );
            }
            ui.item.children( 'td, th' ).css( 'border-bottom-width', '0' );
            ui.item.css( 'outline', '1px solid #aaa' );
        },
        stop: function( event, ui ) {
            ui.item.removeAttr( 'style' );
            ui.item.children( 'td, th' ).css( 'border-bottom-width', '1px' );
        },
        update: function( event, ui ) {
            var termid     = ui.item.data('post_id'); // this post id

            var prevtermid = ui.item.prev().data('post_id');
            var nexttermid = ui.item.next().data('post_id');

            // Show Spinner
            ui.item.find( '.check-column input' ).hide().after( '<img alt="processing" src="images/wpspin_light.gif" class="waiting" style="margin-left: 6px;" />' );
            // Go do the sorting stuff via ajax
            $.post( ajaxurl, { action: 'sorting_element_ppo_contact_form', post_parent: ppo_contact_form.post_id, id: termid, previd: prevtermid, nextid: nexttermid }, function(response){
				ui.item.find( '.check-column input' ).show().siblings( 'img' ).remove();
            });

            // Fix cell colors
            $( 'table.widefat tbody tr' ).each( function() {
                var i = jQuery( 'table.widefat tbody tr' ).index( this );
                if ( i%2 === 0 ) {
                    jQuery( this ).addClass( 'alternate' );
                } else {
                    jQuery( this ).removeClass( 'alternate' );
                }
            });
        }
    });
});