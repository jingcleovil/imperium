var form = $('.form');

var procJSON = {
	retry : function(data,form)
	{
		console.log(data);
	}
}

$(document).ready(function(handler){

	$(document).ajaxStart(function(){
		$('.preloader').show();
	});

	$(document).ajaxStop(function(){
		$('.preloader').hide();
	});

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
				try
				{
					procJSON[data.action](data,frm);
				}
				catch(e)
				{
					console.log(e.message);
				}

			}
			,error: function(xhr)
			{
				console.log(xhr.responseText);
				$preloader(false);
			}
		})
	})

});