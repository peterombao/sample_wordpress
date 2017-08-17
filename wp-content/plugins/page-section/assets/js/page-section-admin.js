jQuery( function ( $ ) {

    if ( 'undefined' === typeof page_section_admin ) {
        return;
    }

    var $lists_screen = $( '.edit-php.post-type-list' ),
        $title_action   = $lists_screen.find( '.page-title-action:first' );

    $title_action.attr('href', page_section_admin.url);

    var $list_screen = $( '.post-php.post-type-list' ),
        $title_action   = $list_screen.find( '.page-title-action:first' );

    $title_action.attr('href', page_section_admin.url);
    $list_screen.find('#post').prepend('<input id="post_parent" name="post_parent" type="hidden" value="' + page_section_admin.post_parent + '" />');

    $( '.post-new-php.post-type-list').find('#post').prepend('<input id="post_parent" name="post_parent" type="hidden" value="' + page_section_admin.post_parent + '" />');

    $( '.edit-php.post-type-list table.wp-list-table tr').append(
        '<td class="column-handle" style="width:17px"></td>'
    );

    $( '.edit-php.post-type-list table.wp-list-table').sortable({
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
            var termid     = ui.item.find( '.check-column input' ).val(); // this post id

            var prevtermid = ui.item.prev().find( '.check-column input' ).val();
            var nexttermid = ui.item.next().find( '.check-column input' ).val();

            // Show Spinner
            ui.item.find( '.check-column input' ).hide().after( '<img alt="processing" src="images/wpspin_light.gif" class="waiting" style="margin-left: 6px;" />' );

            // Go do the sorting stuff via ajax
            $.post( ajaxurl, { action: 'lists_sorting', post_parent: page_section_admin.post_parent, id: termid, previd: prevtermid, nextid: nexttermid }, function(response){
//                if ( response === 'children' ) {
//                    window.location.reload();
//                } else {
                //console.log(response);
                    ui.item.find( '.check-column input' ).show().siblings( 'img' ).remove();
//                }
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

    $( '.type_box' ).appendTo( '#additional-fields .hndle span').removeClass('hidden');

    $( function() {
        // Prevent inputs in meta box headings opening/closing contents.
        $( '#additional-fields' ).find( '.hndle' ).unbind( 'click.postboxes' );

        $( '#additional-fields' ).on( 'click', '.hndle', function( event ) {

            // If the user clicks on some form input inside the h3 the box should not be toggled.
            if ( $( event.target ).filter( 'input, option, label, select' ).length ) {
                return;
            }

            $( '#additional-fields' ).toggleClass( 'closed' );


        });
    });

    $( '#product-type' ).change(function() {
        var data         = {
            action:   'change_entry',
            po_entry_id: $(this).val()
        };

        $.post( ajaxurl, data, function( response ) {
            $( '#additional-fields .inside' ).html( response );
        });
        //console.log($(this).val())
    });

});