(function($){
	$(document).ready(function(){
		$("#nguoi_lon, #tre_em, #set_do_an, #chon_phong").on( 'change', function(){
			var nguoi_lon = $('#nguoi_lon').val();
			var tre_em = $('#tre_em').val();
			var set_do_an = $('#set_do_an').val();
			var phong = $('#chon_phong').val();
			console.log( set_do_an );
			$.ajax( {
				type: "post",
				dataType: "json",
				url : meta.ajaxURL,
				data: {
					action: 'total',
					nguoi_lon: nguoi_lon,
					tre_em: tre_em,
					set_do_an: set_do_an,
					phong: phong
				},
				success: function(response) {
					$('#tong_tien').val(response.tong_tien);
				},
				error: function( jqXHR, textStatus, errorThrown ){
					console.log( 'The following error occured: ' + textStatus, errorThrown );
				}

			} )
		} )

	})
})(jQuery)