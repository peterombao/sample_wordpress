jQuery( function ( $ ) {
	$('.cf-add-el').on('submit', function(){
		var thisForm = $(this);
		var data = {};
		var thisFormData = thisForm.serializeArray();
		data.form = {};
		$.each(thisFormData, function(i, field) {
			if(field.name != 'ID'){
				data.form[field.name] = field.value;
			}else{
				data.ID = field.value;
			}
		});
		if(data.ID == ''){
			data.action = 'add_element_ppo_contact_form';
			data.post_parent = ppo_contact_form.post_id;
			data.dataType = 'json';
			$.post( ajaxurl, data, function( response ) {
				if ( response.success ) {
					$( '.table-cf-el tbody' ).prepend( response.data.html );
					thisForm[0].reset();
					tb_remove();
				}else{
					console.log(response);
				}
			});
		}else{
			data.action = 'edit_element_ppo_contact_form';
			$.post( ajaxurl, data, function( response ) {
				var thisRow = $( '.table-cf-el tbody' ).find('[type=hidden][value=' + data.ID + ']').closest('tr');
				thisRow.find('td:nth-child(1) a').text(data.form.form_label);
				thisRow.find('td:nth-child(2)').text(data.form.form_name);
				tb_remove();
			});
		}
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

	$('.btn-modal-field').click(function(){
		var type = $(this).data('field_type');
		$('#cf-' + type +' .cf-add-el [name=ID]').val('');
		$('#cf-' + type +' .cf-add-el')[0].reset();
	});
	
	$('.table-cf-el td a').click(function(){
		var title = $(this).attr('title');
		var href = $(this).attr('href');
		var id = $(this).data('post_id');
		var type = $(this).data('field_type');
		$('#cf-' + type +' .cf-add-el [name=ID]').val('');
		$('#cf-' + type +' .cf-add-el')[0].reset();
		$.post( ajaxurl, { action: 'get_element_ppo_contact_form', id: id }, function(response){
			$('#cf-' + type +' .cf-add-el [name=ID]').val(response.data.post.ID);
			$.each(response.data.post_meta, function(index, value){
				if($('#cf-' + type +' .cf-add-el [name=' + index + ']').length){
					$('#cf-' + type +' .cf-add-el [name=' + index + ']').val(value[0])
				}
			});
			tb_show(title, href, false);
		});
		
		return false;
	});
});