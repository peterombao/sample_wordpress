jQuery( function ( $ ) {
    $('.calculate-USD-action').click(function(){
        var data = {
            action: 'recalculate_usd',
            id: wc_ppo.id
        };
        $.post( ajaxurl, data, function( response ) {
            $('[name=_order_total_USD_currency]').val(response);
        });
    });
	
	$('.save-USD-action').click(function(){
		var data = {
            action: 'save_usd',
            id: wc_ppo.id,
			_order_total_USD_currency: $('[name=_order_total_USD_currency]').val()
        };
        $.post( ajaxurl, data, function( response ) {
            $('[name=_order_total_USD_currency]').val(response);
        });
	});
});