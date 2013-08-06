var form = $('.form');

$(document).ready(function(handler){

	form.submit(function(e){
		e.preventDefault();

		var frm = $(this),
		    dt = frm.serializeArray(),
		    action = frm.attr('action');

		$.ajax({
			url: action,
			data: dt,
			dataType: 'json',
			type: 'post',
			success: function(data)
			{
				console.log(data);
			}
			,error: function(xhr)
			{
				console.log(xhr.responseText);
			}
		})
	})

});